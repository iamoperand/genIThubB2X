@extends('template.default')

@section('content')

@foreach($data as $info)
<div class="col-md-offset-2 col-md-8">

<div class="modal-content">
        <div class="modal-header">
          
        <h4 class="modal-title">Welcome to B2X Services</h4>
        </div>
        <div class="modal-body">
          <p id="myText" style="font-size:1.2em">Your token number is <span id="show-token" style="font-weight:700;font-size:1.4em;">{{ $info->token_num }}</span></p>
          <br />
          <br />
          <label>
        <span>Voice</span>
        <select id="voiceOptions"></select>
        <div class="btn btn-default" onclick="speak();">Speak</div>
        </label>  
          <p>Here are your details:</p>
          <p>Name - <span>{{ $info->name }}</span><br />
          Purpose - <span>{{ $info->purpose }}</span><br />
          Mobile Number - <span>{{ $info->phone_num }}</span><br />
          Check-in time - <span>{{ $info->start_timestamp }}</span></p>
        </div>
        <div class="modal-footer">
          

          <a href="{{url('enquiry')}}" class="close"> 
              OK
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