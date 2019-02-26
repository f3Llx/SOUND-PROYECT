plyr.setup(document.querySelector('.plyr'));
var radio = document.querySelector('.plyr').plyr;

var player2 = document.querySelector('.playlist');
var songs = player2.querySelectorAll('.playlist--list li');
var i;
var active = null;

for(i = 0; i < songs.length; i++) {
	songs[i].onclick = changeChannel;
}

setSource( getId(songs[0]), buildSource(songs[0]) );

document.querySelector('.plyr').addEventListener('ended', nextSong);

function changeChannel(e) {
	setSource( getId(e.target), buildSource(e.target), true );
}

function getId(el) {
	return Number(el.getAttribute('data-id'));
}

function buildSource(el) {
	var obj = [{
		src: el.getAttribute('data-audio'),
		type: 'audio/ogg'
	}];

	return obj;
}

function setSource(selected, sourceAudio, play) {
	if(active !== selected) {
		active = selected;
		radio.source({
			type: 'audio',
			title: 'test',
			sources: sourceAudio
		});

		for(var i = 0; i < songs.length; i++) {
			if(Number(songs[i].getAttribute('data-id')) === selected) {
				songs[i].className = 'active';
			} else {
				songs[i].className = '';
			}
		}

		if(play) {
			radio.play();
			$("container").show();
			
		}
	} else {
		radio.togglePlay();
		
	}
}

function nextSong(e) {
	var next = active + 1;

	if(next < songs.length) {
		setSource( getId(songs[next]), buildSource(songs[next]), true );
	}
}




var utils = {
	forEach: function forEach(array, callback, scope) {
	  for (var i = 0; i < array.length; i++) {if (window.CP.shouldStopExecution(0)) break;
		callback.call(scope, i, array[i]);
	  }window.CP.exitedLoop(0);
	},
  
	hasClass: function hasClass(el, className) {
	  if (el.classList) {
		return el.classList.contains(className);
	  } else {
		return new RegExp('(^| )' + className + '( |$)', 'gi').test(el.className);
	  }
	},
  
	addClass: function addClass(el, className) {
	  if (el.classList) {
		el.classList.add(className);
	  } else {
		el.className += ' ' + className;
	  }
	},
  
	removeClass: function removeClass(el, className) {
	  if (el.classList) {
		el.classList.remove(className);
	  } else {
		el.className = el.className.replace(new RegExp('(^|\\b)' + className.split(' ').join('|') + '(\\b|$)', 'gi'), ' ');
	  }
	},
  
	toggleClass: function toggleClass(el, className) {
	  if (el.classList) {
		el.classList.toggle(className);
	  } else {
		var classes = el.className.split(' ');
		var existingIndex = classes.indexOf(className);
  
		if (existingIndex >= 0)
		classes.splice(existingIndex, 1);else
  
		classes.push(className);
  
		el.className = classes.join(' ');
	  }
	} };
  
  
  