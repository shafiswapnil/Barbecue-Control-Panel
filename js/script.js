// reset everything on startup
$(document).ready(function () {
    resetForms();
});

function resetForms() {
    document.querySelector('[role=form]').reset();
}

// input validation
(function() {
  'use strict';
  window.addEventListener('load', function() {
	// Fetch all the forms we want to apply custom Bootstrap validation styles to
	var forms = document.getElementsByClassName('needs-validation');
	// Loop over them and prevent submission
	var validation = Array.prototype.filter.call(forms, function(form) {
	  form.addEventListener('submit', function(event) {
		if (form.checkValidity() === false) {
		  event.preventDefault();
		  event.stopPropagation();
		}
		form.classList.add('was-validated');
	  }, false);
	});
  }, false);
})();

// left-right counter
;(function() {
	let left = document.querySelector('#left');
	let right = document.querySelector('#right');
	let displayL = document.querySelector('input[name=left]');
	let displayR = document.querySelector('input[name=right]');

	let l = 0;
	let watchL = null;
	let r = 0;
	let watchR = null;

	left.addEventListener('mousedown', () => {
		if(!watchL){
			l = 0;
			watchL = setInterval(() => {
				l++;
				displayL.value = l;
			}, 1);
		}
	});
	left.addEventListener('mouseup', () => {
		if(watchL){
			clearInterval(watchL);
			watchL = null;
		}
	});
	left.addEventListener('touchstart', () => {
		if(!watchL){
			l = 0;
			watchL = setInterval(() => {
				l++;
				displayL.value = l;
			}, 1);
		}
	}, {passive: true});
	left.addEventListener('touchend', () => {
		if(watchL){
			clearInterval(watchL);
			watchL = null;
		}
	}, {passive: true});

	right.addEventListener('mousedown', () => {
		if(!watchR){
			r = 0;
			watchR = setInterval(() => {
				r++;
				displayR.value = r;
			}, 1);
		}
	});
	right.addEventListener('mouseup', () => {
		if(watchR){
			clearInterval(watchR);
			watchR = null;
		}
	});
	right.addEventListener('touchstart', () => {
		if(!watchR){
			r = 0;
			watchR = setInterval(() => {
				r++;
				displayR.value = r;
			}, 1);
		}
	}, {passive: true});
	right.addEventListener('touchend', () => {
		if(watchR){
			clearInterval(watchR);
			watchR = null;
		}
	}, {passive: true});
})();

// {passive: true}

// handling spray
function handleChange(checkbox){
	if(checkbox.checked == true) {
		$("#spray1").attr("disabled", "disabled");
		$("#spray2").attr("disabled", "disabled");
		$("#spray3").attr("disabled", "disabled");
	} else{
		// do nothing...
		// or maybe removing attribute disabled attribute
	}
}

function res(){
	$("#spray1").removeAttr("disabled");
	$("#spray2").removeAttr("disabled");
	$("#spray3").removeAttr("disabled");
}

// handling issue of disabled input on submit
$("form").submit(function() {
    $("#spray1").removeAttr("disabled");
    $("#spray2").removeAttr("disabled");
    $("#spray3").removeAttr("disabled");
});

// Bootstrap tooltip
$(function() {
  $('[data-toggle="tooltip"]').tooltip();
});