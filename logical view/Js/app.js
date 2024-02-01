// Text Processor Factory
var TextProcessorFactory = {
    createProcessor: function () {
        return {
            startsWithSymbol: function (text) {
                var firstChar = text.trim().charAt(0);
                return /[^\w\s]/.test(firstChar);
            }
        };
    }
};

var TextProcessorModule = TextProcessorFactory.createProcessor();

var nativeVoice = 1, voices, speechSpeed = 1, info;

var setInput = function () {
    var a = document.getElementById("ttsInput").value;
    if (a !== "") {
        info = a;

        // Use the Text Processor Module to check if the text starts with a symbol
        if (TextProcessorModule.startsWithSymbol(info)) {
            alert("Text starts with a symbol!");
        }
    } else {
        info = "Yo... Whazzzup ??? Paste anything here, and press the speak button to convert text into speech !!!";
    }
}

// Rest of your code...


var setSpeed = function(x) {
    var b = document.getElementById("select-speed").value;
    speechSpeed = b;
    console.log(b);
}

var startSpeech = function() {
    setInput();
    voices = document.getElementById("select-voice");
    nativeVoice = voices.options[voices.selectedIndex].value;
    setSpeed();
    switch(nativeVoice){
        case "1":
            responsiveVoice.speak(info, "UK English Female",{rate: speechSpeed});
            break;
        case "2":
            responsiveVoice.speak(info, "UK English Male", {rate: speechSpeed});
            break;
        case "3":
            responsiveVoice.speak(info, "Albanian Female", {rate: speechSpeed});
            break;
        case "4":            
            responsiveVoice.speak(info, "Albanian Male", {rate: speechSpeed});
            break;
    }
}

var stopSpeech = function() {
    responsiveVoice.cancel();
}

var checkSupport = function() {
    if(responsiveVoice.voiceSupport()) {
        responsiveVoice.speak("Your browser supports Text To Speech conversion.");
    }
    else{
        alert("Sorry ! Your browser doesn't support Text To Speech conversion.");
    }    
}

var info = function() {
    alert("How to use ONLINE TTS : \n \n* Press 'i' to highlight the TEXTAREA and \" CTRL+V \" to paste the text or type any text inside it.\n\n* Press \"CTRL+ENTER\" or \"CMD+ENTER\" to speak out the text entered.\n\n* Press \"CTRL+/\" or \"CMD+/\" to stop the speech.\n\n\n");
}

Mousetrap.bind('i', function() { 
    var x = document.getElementById("ttsInput");
    x.focus();
});

Mousetrap.bind(['command+enter', 'ctrl+enter'], function(e) {
    startSpeech();
});

Mousetrap.bind(['command+/', 'ctrl+/'], function(e) {
    stopSpeech();
});

/** 

// code to control the speech speed using keyboard combinations

Mousetrap.bind(['ctrl+,'], function(e) {
    if(speechSpeed >= 0){
        speechSpeed -= 0.2;    
        document.getElementById("select-speed").value = speechSpeed;
    } if(speechSpeed <= 0){
        speechSpeed = 0;
        alert("This is the minimum speed of speech available !");
    }
    console.log(speechSpeed);
});

Mousetrap.bind(['ctrl+.'], function(e) {
    if(speechSpeed !== 0 && speechSpeed <= 1.4){
        speechSpeed += 0.2;    
        document.getElementById("select-speed").value = speechSpeed;
    } if(speechSpeed > 1.4){
        speechSpeed = 1.5;
        alert("This is the maximum speed of speech available !");
    }
    console.log(speechSpeed);
});

**/
