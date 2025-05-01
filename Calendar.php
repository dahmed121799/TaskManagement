<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="Payton Todd"/>
  <meta name="description" content="Current Tasks with dates on a Calendar" />
  <title>Calendar</title>
  
  <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        display: flex;
    }

    .sidebar {
		background-color: lightgrey;
		width: 170px;
		padding: 10px;
		height: 100vh;
		box-sizing: border-box;
		border-top-right-radius: 20px;
		border-bottom-right-radius: 20px;
		position: relative;
    }

    .sidebar p {
		color: black;
		margin: 10px 0;
    }
	.sidebar a {
		color: black;
		text-decoration: none; 
	}

    .main-content {
        flex-grow: 1;
        padding: 20px;
    }

    .calendar-header {
        border: 2px solid #555;
        padding: 10px;
        text-align: center;
        font-size: 20px;
        margin-bottom: 10px;
        background-color: lightgrey;
		color: #6200ea;
    }

    .controls {
        margin-bottom: 10px;
    }

    select {
        padding: 5px;
    }

    .calendar {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        gap: 1px;
        background-color: #black;
        border: 2px solid #555;
    }

    .calendar div {
        background-color: white;
        min-height: 80px;
        padding: 5px;
        position: relative;
        border: 1px solid #ccc;
    }

    .dot {
        height: 10px;
        width: 10px;
        border-radius: 50%;
        display: inline-block;
        margin: 2px 2px;
    }
	
	.current-day {
	background-color: lightblue; 
	border: 2px solid lightblue;
	}

    .dot.green { background-color: green; }
    .dot.red { background-color: red; }
	
  </style>
  <script>
    const today = new Date();
    document.addEventListener("DOMContentLoaded", () => {
      const header = document.querySelector(".calendar-header");
      const date = new Date();
      const options = { month: 'long', year: 'numeric' };
      header.textContent = `${date.toLocaleDateString(undefined, options)}`;
    });
	function addNote() 
	{
		const input = document.getElementById("note-input");
		const noteText = input.value.trim();

		if (noteText !== "") 
		{
		  const li = document.createElement("li");
		  li.textContent = noteText;
		  document.getElementById("notes-list").appendChild(li);
		  input.value = "";
		}
	}

	function removeNote() 
	{
		const list = document.getElementById("notes-list");
		
		if (list.lastChild) 
		{
		  list.removeChild(list.lastChild);
		}
	}
	
	const todayId = `Day ${today.getDate()}`;
	const todayCell = document.getElementById(todayId);
		if (todayCell) 
		{
		  todayCell.classList.add("current-day");
		}
  </script>
</head>
<body>
  <div class="sidebar">
    <ul>
		<liv><a href="/dashboard.html"rel ="last" target="_parent"><strong>Dashboard</strong><br></a>
		<liv><a href="./To-Do list page.php"><strong>To do list</strong><br></a>
		<liv><a href="index.html"><strong>Login</strong><br></a>
	</ul>
	
	<p>
	<div>
		<strong>Notes:</strong>
		<ul id="notes-list" style="padding-left: 15px;"></ul>
		<input type="text" id="note-input" placeholder="Enter note" style="width: 90%; margin-top: 5px;">
		<button onclick="addNote()" style="margin-top: 5px;color: Black">Add</button>
		<button onclick="removeNote()" style="margin-top: 5px; color: Black">Remove Last</button>
	</div></p>
	</div>

    <div class="main-content">
    <div class="calendar-header">Month and Year</div>
    <div class="controls">
    </div>
	
    <div class="calendar">
      <div id="Day 1">1</div>
      <div id="Day 2">2</div>
      <div id="Day 3">3</div>
      <div id="Day 4">4</div>
      <div id="Day 5">5</div>
      <div id="Day 6">6</div>
      <div id="Day 7">7</div>
      <div id="Day 8">8</div>
      <div id="Day 9">9</div>
      <div id="Day 10">10</div>
      <div id="Day 11">11</div>
      <div id="Day 12">12</div>
      <div id="Day 13">13</div>
      <div id="Day 14">14</div>
      <div id="Day 15">15</div>
      <div id="Day 16">16</div>
      <div id="Day 17">17</div>
      <div id="Day 18">18</div>
      <div id="Day 19">19</div>
      <div id="Day 20">20</div>
      <div id="Day 21">21</div>
      <div id="Day 22">22</div>
      <div id="Day 23">23</div>
      <div id="Day 24">24</div>
      <div id="Day 25">25</div>
      <div id="Day 26">26</div>
      <div id="Day 27">27</div>
      <div id="Day 28">28</div>
      <div id="Day 29">29</div>
      <div id="Day 30">30</div>
      <div id="Day 31">31</div>
	  <div></div>
	  <div></div>
	  <div></div>
	  <div></div>
    </div>
  </div>
  
  <?php
	$host = 'localhost';
	$db   = 'taskmanagement';
	$user = 'root';
	$pass = '';

	$conn = new mysqli($host, $user, $pass, $db);
	if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

	$sql = "SELECT TaskTitle, AddDate, DueDate, Status FROM `to-do list`";
	$result = $conn->query($sql);

	$tasks = [];

	while ($row = $result->fetch_assoc()) {
		$date = date('Y-m-d', strtotime($row['DueDate']));
		$tasks[$date][] = $row['Status']; 
	}

	echo json_encode($tasks);
?>
</body>

