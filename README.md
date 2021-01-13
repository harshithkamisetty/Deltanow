# Deltanow
As the given task is to build a backend apis for todo list using google autho.
Google login and logout Apis is in google_autho folder.
for Todo
As i have a created datatables named
task(tid,tname,description);
Completed_task(tid,tname,description);
Deleted_task(tid,tname,description);
As tid is task id which will automatically get incremented
tname is task name
description is description about the task.
# read
If you want to display all the tasks the request can be written ain url format as

POST /read.php
# Create
If you want to create a task the request can be written in URL format as:

POST /create.php

You have to send a body containing:
{Taskname,Description}
# Update
To update a task in this table the request can be written in URL format as:

PUT /update.php
Send as a body:
{Tid,tname,description}

# delete
If you want to delete a task from this table & add that to Deleted_task the request can be written in URL format as:

PUT /delete.php
Send as a body:
{Tid};

# completed
If you want to mark as a completed task from this table & add that to completed_task the request can be written in URL format as:

PUT /completed.php
Send as a body:
{Tid};
