$(document).ready(function() {
 "use strict";
//-------------------Variables----------------------//
    var boxes = ["red", "green", "blue", "yellow"];   
    var liteId = [];
    var count = 0;     	

    var userClicked = "";
    var userClickedIndex = 0
        	
            
	var startAudio = document.createElement("audio");
        startAudio.setAttribute('src', '/sound/arcade_game_alarm_short.mp3');
    var audioFail = document.createElement("audio");
        audioFail.setAttribute('src', '/sound/arcade_game_fall_tone_001.mp3');
    var audioClick = document.createElement("audio");
        audioClick.setAttribute('src', "https://s3.amazonaws.com/freecodecamp/simonSound1.mp3");
	

//------------------------Functions----------------------------//	

        	function random() {	
        		var randomColor = Math.round(Math.random() *  boxes.length);
        		liteId.push(boxes[randomColor]);
        		return liteId;
        	}

        	function flashSequence() {
        		liteId.forEach(function(element, index) {
        			setTimeout(function() {
	        			$('#' + element).animate( {
	        				opacity: "1",
	        			}, 800). animate( {
	        				opacity: "0.5"
	        			}, 200);
        			}, index * 1000);
        		});
        	}

            $(".box").click(function(){
                $('#' + this.id).animate( {
                    opacity: "1",
                        }, 800). animate( {
                    opacity: "0.5"
                        }, 200);
            });

        	$("#start").click(function(){
        		random();
                alert("Follow the Sequence!")
        		flashSequence();
                startAudio.play();
                $(this).attr("disabled", true);

			});

			$(".box").click(function(){
                audioClick.play();
				userClicked = this.id;
				if (userClicked === liteId[userClickedIndex]) {
					userClickedIndex += 1;
					if (userClickedIndex === liteId.length){
						userClickedIndex = 0;
						count++;
						updateCount(); 

                        var timeOut = setTimeout(function(){
                            random();
                            flashSequence();
                        }, 2000);
					
					}
				} else{
                    gameOver();
                    alert("Game Over!");
				}

			});

			function updateCount(){
				$("#count").text(count);
			}

            function gameOver(){
                audioFail.play();
                userClicked = "";
                userClickedIndex = 0;
                liteId = [];
                count = 0;
                $("#start").attr("disabled", false);
                location.reload();
            }

           
			
         });
