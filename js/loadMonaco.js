var monacoModalFlag = 0;
var monacoData = "";
var tooltip = "";
var monacoShiftFlag = false;
var glowFlag = false;
var buttonFlag = false;
var time, words, characters, wpm, i;
time = words = characters = wpm =0; 
var mobileId = 0;
var mobileFlag = false;
//toggle modal - code kept here to avoid conflict with esc key control
//https://github.com/chriscook/on-screen-keyboard
//for mobile support using osk
//Or write one to detect if mobile -> add event listner for input focus and and set interval for every 50ms for change in value if spacebar then do the normal and remove(interval) on blur event
//http://mobiledetect.net/
// @3&focus-> 3, 7, 11, 15  
var monacoWpm, monacoWords, monacoCharacters;
monacoWpm = $('#wpm');
monacoWords = $('#words');
monacoCharacters = $('#characters');

$('.modal svg').click(function(e) {
    $('.overlay, .modal').removeClass('active');
    e.preventDefault();
});

$(document).keyup(function(e) {
    if (e.keyCode == 27) { 
        $('.overlay, .modal').removeClass('active');
        monacoModalFlag = 0;
    }
});

function KeyPress(e) {
    var evtobj = window.event? event : e;
    if (evtobj.keyCode == 13 && evtobj.shiftKey){
        monacoData += "<br />";
        monacoShiftFlag = true;
    }
}
function startTimer(){
    var id = setInterval(function(){
        time += 0.00166667;
    }, 100);
    return id;
}
document.onkeydown = KeyPress;

var mobileKeypad = function(object, screen){
    //get object and check if contains space, if true add to data, try markup for mobile
    mobileId = setInterval(function(){
        if(object.val() != tooltip){
            object.tooltipster('hide');
        }
        screen.text(object.val());
        if(object.val().indexOf(" ") >= 0){
            //check markup for new line
            if(object.val().toLowerCase().indexOf("%b%") >= 0){
                //if text exists, add to monacoData
                monacoData += object.val().replace(/%b%/g, "<br />");
            }
            else{
                //add data to data variable
                monacoData += (object.val().split(" ")[0] + " ");
            }
            //console.log("monacoData inside mobile : " + monacoData);
            object.val("");
        }

    }, 10);
}

var app = angular.module('monacoApp', []);
app.controller('monacoControl', function($scope) {
    var timerFlag = false;
    var id = -1;
    $scope.inputText = "Type!";
    var inputBox, monacoMenu;
    inputBox = $("#inputText");
    monacoMenu = $(".menu-toggle");

    $scope.assortData = function ($event){
        //start timer
        if(!timerFlag){
            id = startTimer();
            timerFlag = !timerFlag;
        }
        var keyCode = $event.which || $event.keyCode;

        $scope.displayText = $scope.inputText;

        if (keyCode === 13) {
            //check shift condition first
            if (monacoShiftFlag) {}
                else{
                //toggle modal
                if(monacoModalFlag == 0){
                    $('#draft-body').html(monacoData);
                    $('.overlay, .modal').addClass('active');
                    monacoModalFlag = 1;
                }
                else{
                    $('.overlay, .modal').removeClass('active');
                    monacoModalFlag = 0;
                }           
            }
            monacoShiftFlag = false;
        }
        if (keyCode === 32){
            //each time space is pressed update stats
            if(!mobileFlag){
                monacoData = monacoData + $scope.inputText + " ";
                $scope.inputText = "";

                words += 1;
                characters = monacoData.length;
                wpm = words / time;
                monacoWords.text(words);
                monacoCharacters.text(characters);
                monacoWpm.text(Math.round(wpm, 2));
            }
        }
        //tooltip behaviour for mobile devices
        if(mobileFlag){
            if($scope.inputText != tooltip){
                inputBox.tooltipster('hide');
            }
        }
    }
    $scope.angularDown = function($event){
        var keyCode = $event.which || $event.keyCode;
        if(keyCode === 16){
            inputBox.css("border-color", "#cc181e");
        }
    }
    $scope.angularUp = function($event){
        var keyCode = $event.which || $event.keyCode;
        if(keyCode === 16){
            inputBox.css("border-color", "#e6e6fa");
        }
    }
    $scope.angularBlur = function(){
        inputBox.css("border-color", "#6e6e6e");
        if(mobileFlag){
            inputBox.tooltipster('hide');
            monacoMenu.fadeToggle();
        }
    }
    $scope.angularFocus = function(){
        inputBox.css("border-color", "#e6e6fa");
        if(mobileFlag){
            tooltip = inputBox.val();
            inputBox.tooltipster('show');
            //get current val and on val change trigger hide
            monacoMenu.fadeToggle();
        }
    }
});

$(document).ready(function(){
    var modalOverlay, buttonWrapper, switchContainer, motherWrap, smallOverlay, extraPanel, statPanel, suggestionPanel, psuedoBlock, mobile, inputText, screen, menu;
    
    modalOverlay = $(".modal-overlay");
    buttonWrapper = $(".button-wrapper");
    switchContainer = $(".switch-container");
    motherWrap = $("#mother-wrap");
    smallOverlay = $(".overlay");

    extraPanel = $(".extra-panel");
    statPanel = $(".stat-panel");
    suggestionPanel = $(".suggestion-panel");
    psuedoBlock = $(".psuedo-block");

    mobile = $("#psuedo-div");
    inputText = $("#inputText");
    screen = $(".display-text");
    menu = $(".menu-toggle");

    modalOverlay.hide();
    buttonWrapper.hide();
    switchContainer.hide();

    statPanel.hide();
    suggestionPanel.hide();

    //first priority -> dont see red
    modalOverlay.css("opacity", "1");
    extraPanel.css("opacity", "1");

    if(mobile.css("opacity") == "1"){
        //mobile
        mobileFlag = !mobileFlag;
        var id;

        $("#psuedo-submit span").text("Editor");
        //menu.fadeToggle();
        menu.on('click', function() {
            $(this).toggleClass("on");
            buttonWrapper.fadeToggle();
        });

        inputText.attr("title", "<span class='hint'>Press <swt-white-kbk>Space</swt-white-kbk> to record your words.<br />Press <swt-white-kbk>Enter</swt-white-kbk> for toggling Quick View Mode.<br />Type <swt-white-kbk>%b%</swt-white-kbk> to add a new line.</span>");
        inputText.tooltipster({
            animation: 'grow',
            delay: 200,
            theme: 'tooltipster-punk',
            position: 'top',
            contentAsHTML: true,
            trigger: 'custom'
        });

        inputText.on("focus", mobileKeypad(inputText, screen));
        inputText.on("blur", function(){
            clearInterval(mobileId);
            //$(".menu-toggle").fadeToggle();
            inputText.off("focus", mobileKeypad(inputText, screen));
        });
        //set timeout
        //inputText.tooltipster('show');
    }
    else{
        menu.on('click', function() {
            $(this).toggleClass("on");
            buttonWrapper.fadeToggle();
            switchContainer.fadeToggle();
        });
        inputText.tooltipster({
            animation: 'grow',
            delay: 200,
            theme: 'tooltipster-punk',
            trigger: 'hover',
            position: 'right',
            contentAsHTML: true
        });
    }
    $("#player-button").on('click', function(e){
        motherWrap.fadeToggle();
        smallOverlay.fadeToggle();
        extraPanel.fadeToggle();
        modalOverlay.fadeToggle();
        e.preventDefault();
    });

    $("#close").on('click', function(e){
        motherWrap.fadeToggle();
        smallOverlay.fadeToggle();
        extraPanel.fadeToggle();
        modalOverlay.fadeToggle();
        e.preventDefault();
    });

    $("#switch").on('click', function(){
        //extraPanel.fadeToggle();
        statPanel.fadeToggle();
    });

    $("#suggestion").on('click', function(){
        //extraPanel.fadeToggle();
        psuedoBlock.fadeToggle();
        suggestionPanel.fadeToggle();
    });
});