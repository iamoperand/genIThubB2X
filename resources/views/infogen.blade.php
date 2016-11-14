@extends('template.default')

@section('content')

@foreach($data as $info)
<div class="col-md-offset-2 col-md-8">

<div class="modal-content">
        <div class="modal-header">
          
        <h4 class="modal-title">Welcome to B2X Services</h4>
        </div>
        <div class="modal-body text-center" >
          <p id="myText" style="font-weight:700;font-size:2.2em;color:#ff6600;">Your token number is {{ $info->token_num }}</p>
          <br />
          <br />
          <div class="text-center">
          <label>

        <span>Voice</span>
        <select id="voiceOptions" class="form-control"></select>
        <br />
        <div class="btn btn-danger" onclick="speak();">Speak</div>
        </label>
        </div>  
        <br />
          <div class="text-center" style="font-size:1.2em;font-weight:600;">Here are your details:</div>
          <div class="text-center">
          <span style="font-size:1.1em;font-weight:700;color:#ff003f"> Name</span> <span style="font-size:1.5em;font-weight:900;">:</span> <span style="font-size:1.2em;font-weight:600;color:#1d33f9;">{{ $info->name }}</span>
          <br />
          <span style="font-size:1.1em;font-weight:700;color:#ff003f"> Purpose</span> <span style="font-size:1.5em;font-weight:900;">:</span> <span style="font-size:1.2em;font-weight:600;color:#1d33f9;">{{ $info->purpose }}</span>
          <br />
          <span style="font-size:1.1em;font-weight:700;color:#ff003f"> Mobile Number</span> <span style="font-size:1.5em;font-weight:900;">:</span> <span style="font-size:1.2em;font-weight:600;color:#1d33f9;">{{ $info->phone_num }}</span>
          <br />
          <span style="font-size:1.1em;font-weight:700;color:#ff003f"> Check-in time</span> <span style="font-size:1.5em;font-weight:900;">:</span> <span style="font-size:1.2em;font-weight:600;color:#1d33f9;">{{ $info->start_timestamp }}</span>
          
          </div>
        </div>
        <div class="modal-footer">
          

          <a href="{{url('enquiry')}}" class="close"> 
              <span style="font-size:1.2em;font-weight:700;color:#000000">OK</span>
          </a> 
        </div>
</div>
</div>
<script type="text/javascript">

      function checkCompatibilty () {
        if(!('speechSynthesis' in window)){
          alert('Your browser is not supported. If google chrome, please upgrade!!');
        }
      };

      checkCompatibilty();

      var voiceOptions = document.getElementById('voiceOptions');
      var myText = document.getElementById('myText');

      var voiceMap = [];

      function loadVoices () {
        var voices = speechSynthesis.getVoices();
        for (var i = 0; i < voices.length; i++) {
          var voice = voices[i];
          var option = document.createElement('option');
          option.value = voice.name;
          option.innerHTML = voice.name;
          voiceOptions.appendChild(option);
          voiceMap[voice.name] = voice;
        };
      };

      window.speechSynthesis.onvoiceschanged = function(e){
        loadVoices();
      };

      function speak () {
        var msg = new SpeechSynthesisUtterance();
        msg.volume = 0.5;
        msg.voice = voiceMap[voiceOptions.value];
        msg.rate = 0.5;
        msg.Pitch = 0.5;
        msg.text = myText.innerHTML;
        window.speechSynthesis.speak(msg);
      };
    </script>
@endforeach
@stop