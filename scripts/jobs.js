/**
* Author: Khanh Hung Nguyen, 102414836
* Target: jobs.html
* Created: 18/04/2019
* Last update: 01/05/2019
* Credits:
*/

"use strict";

function init() {
	document.getElementById("job_1").onclick = job1;
	document.getElementById("job_2").onclick = job2;
}

function job1() {
	localStorage.setItem("Job_Reference_Number", "SS101");
}

function job2() {
	localStorage.setItem("Job_Reference_Number", "DA703");
}
window.onload = init;