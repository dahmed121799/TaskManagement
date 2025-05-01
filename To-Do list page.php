<!DOCTYPE html>
<html lang="en">
<head>
	<!-- The author is Shane Sonnier -->
	<meta charset = "UTF-8">
	<title>Task Management To Do List</title>

	<!-- Sets the styles for all of the different parts of my webpage -->
	<style>
	body
	{
		background-color: #C0C0C0;
		font-family: Arial;
		margin: 0;
		padding: 10px
	}
	h1,h2
	{
		text-align: center;
	}
	.Lists
	{
		width: 600px;
		margin: 20px auto;
		background: #fff;
		padding: 35px;
		border-radius: 10px;
	}
	 label 
	{
      display: block;
      margin-top: 12px;
      font-weight: bold;
    }

    input, textarea, select 
    {
	  border-radius: 4px;
      width: 100%;
      padding: 8px;
	  border: 1px solid #ccc;
      margin-top: 5px;
    }
	form 
	{
	margin-bottom: 20px;
	padding: 20px;
	background-color: #f9f9f9;
	border: 1px solid #ccc;
	border-radius: 8px;
    }
	.DateComplete 
	{
		max-width: 200px;
		margin: 20px auto;
		padding: 25px;
		border-radius: 10px;
	}
	.ColumnsSide
	{
		display: flex;
		justify-content: flex-start;
		gap: 30px;
	}
	.taskList
	{
		margin-top: 30px;
	}
	.TaskList
	{
		flex: 2;
		max-width: 400px;
		margin: 20px 0px 20px 250px;
		background: #fff;
		padding: 25px;
		border-radius: 10px;
		display: flex;
		flex-direction: column;
		min-height: 500px;
	}
	.CalenderSubmit
	{
		text-align: center;
		padding-top: 15px;
	}
	.PushCalender
	{
		flex-grow: 1;
	}
	.header
	{
		padding: 30px;
		text-align: center;
		font-size: 20px;
		background-color: #fff;
		border-radius: 10px;
		box-shadow: 0 4px 10px rgba(0,0,0,0.2);
	}
	.pageLayout
	{
		display: flex;
		gap: 30px;
		padding: 20px;
		align-items: flex-start;
	}
	</style>
</head>
<body>

	<!--  Uses header class to style the header at the top middle  -->
	<div class="header">
	<h1>To-Do List</h1>
	
		<!-- Creates the buttons that are used to get to each webpage -->
		<!-- Also style it using inline to have these align with the middle title -->
		<div style ="margin-top: 10px;">
		<button onclick="location.href='dashboard.php'">Dashboard</button>
		<button onclick="''">Log In</button>
		<button onclick="location.href='Calendar.php'">Calendar</button>
		<button onclick="''">Tasks</button>

		</div>
		<!-- Adds our logo to our website, sets it using inline styles to top left corner -->
		<img src="WebsiteLogo.png" style="width: 180px; height:180px; float: left; margin-right: 20px;
		margin-top: -152px"">
	
		</div>

	
	<div class="ColumnsSide">
	<!-- Creates the list from which the user can build there tasks to add to the task list -->
	<div class="Lists">
		<!-- Styles the form for the user -->
		<form method ="POST" id="theForm">
			<!-- This builds the form by adding labels and inputs under the labels to build the task -->
			<!-- Also adds a submit button to add the task to the right side task list -->
			<label>Task Title</label>
			<input type="text" id="title" name="title">
		
			<label> Task Description</label>
			<textarea placeholder ="Enter task description" id="descript" name="description"></textarea>
		
			<label>Add to Date</label>
			<input type='date' id="add" name="date_added" required>
		
			<label>Due Date</label>
			<input type='date' id="due" name="due_date">
		
			<label>Task Priority</label>
			<select id="priority" name="priority">
			<option>Critical</option>
			<option>Moderate</option>
			<option>Minimal</option>
			</select>
		
			<label>Status</label>
			<select id="status" name="status">
			<option>Completed</option>
			<option>Pending</option>
			<option>Not Started</option>
			</select>
		
			<input type="submit" name="calender" id="calender" value="Add to Calendar" form="theForm">
		
		</form>
	
	</div>

	</div>
	

	</div>
	</div>
	</div>
	<div>
<script>
	
	<!-- Grabs the from and does this when the submit button is selected -->
	document.getElementById("theForm").addEventListener("submit", function(e) {
	
	<!-- Makes variables that will hold the element of each item the user inputs using the id's -->
	var TaskStatus = document.getElementById("status").value;
	var TaskTitle = document.getElementById("title").value;
	var TaskDateAdd = document.getElementById("add").value;
	var TaskDescription = document.getElementById("descript").value;
	var TaskDateDue = document.getElementById("due").value;
	var TaskPriority = document.getElementById("priority").value;

  })
 
</script>

<!-- This script adds the option to delet the list on the right side -->
<script>
<!-- Takes the clear button and will wait for a click to delete the whole task list -->
document.getElementById("Clear").addEventListener("click", function(e) {
document.getElementById("ListsAdder").innerHTML="";
});
</script>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['calender'])) {
 
	//Creates the connection between my page and the backend of our webpages.
    $conn = new mysqli("localhost", "root", "", "taskmanagment_db");

	//Gets the title information
    $title = $_POST['title'];
	//Gets the description information
    $description = $_POST['description'];
	//Gets the date added information
    $date_added = $_POST['date_added'];
	//Gets the due date information
    $due_date = $_POST['due_date'];
	//Gets the priority information
    $priority = $_POST['priority'];
	//Gets the status information
    $status = $_POST['status'];

 
	//Addes the information that has been gathered into our database into the to-do list table
    $sql = "INSERT INTO `to-do list` (TaskTitle, TaskDescription, AddDate, DueDate, TaskPriority, Status)
            VALUES ('$title', '$description', '$date_added', '$due_date', '$priority', '$status')";
	//Closes the connection the the database
			$conn->query($sql);
			$conn->close();
}
?>

</body>