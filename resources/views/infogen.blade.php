@extends('template.default')

@section('content')

@foreach($data as $info)
<div class="col-md-offset-2 col-md-8">

<div class="modal-content">
        <div class="modal-header">
          
        <h4 class="modal-title">Welcome to B2X Rohini</h4>
        </div>
        <div class="modal-body">
        <div class="text-center">
          <p id="myText" style="font-weight:700;font-size:2.2em;color:#ff6600;font-family: 'Lato', sans-serif;">Your token number is {{ $info->token_num }}</p>
         </div>
          <br />
          <br />
          <div class="text-center">
          <label>

        <span>Voice</span>
        <select id="voiceOptions" class="form-control"></select>
        <br />
        <div class="btn btn-primary" onclick="speak();">Speak</div>
        </label>
        </div>  
        <br />
          
          <div class="col-md-offset-4">
          <span style="font-size:1.1em;font-weight:700;color:#848484;font-family: 'Lato', sans-serif;"> Name</span>: <span style="font-size:1.4em;font-weight:600;color:#282828;">{{ $info->name }}</span>
          <br />
          <span style="font-size:1.1em;font-weight:700;color:#848484;font-family: 'Lato', sans-serif;"> Purpose</span>: <span style="font-size:1.4em;font-weight:600;color:#282828;">{{ $info->purpose }}</span>
          <br />
          <span style="font-size:1.1em;font-weight:700;color:#848484;font-family: 'Lato', sans-serif;"> Mobile Number</span>: <span style="font-size:1.4em;font-weight:600;color:#282828;">{{ $info->phone_num }}</span>
          <br />
          <span style="font-size:1.1em;font-weight:700;color:#848484;"> Check-in time</span>: <span style="font-size:1.4em;font-weight:600;color:#282828;">&nbsp;{{ $info->start_timestamp }}</span>
          
          </div>
        </div>
        <div class="modal-footer">
          

          <a href="{{url('enquiry')}}" class="close" style="opacity:0.6;"> 
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