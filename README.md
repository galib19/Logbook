# Logbook
‘Logbook’ is a web based application which serves as a personal task management tool. This is a simple note taking application that allows you to create text notes, lists, and more. There is are two interfaces- admin interface and user interface. Users have to authenticate to the system to perform tasks. They can add, remove, update notes, lists, tasks, to-do-list, reminder. They can update their information in the account. There is a common introduction page for all the users. From there they can sign up and log in. A non-user can register to be a user. There is a search-bar to search specific note by using heading or tag words.

# Quality Function Deployment (QFD):

# Normal Requirements:

Adding Notes
Adding Lists
Adding Attachments 
Adding Tags
Adding Tasks


# Expected Requirements:

Providing personal account for user
Secured authentication system
Shared tasks with other user/s
Synchronizing date and time with calendar and clock

# Exciting Requirements: 

Connecting accounts to mail
Adding Reminder via mail 

# Features: 

Registration

Anyone can sign up for using this application. She must provide her info like username, designation, date of birth, address, phone number, email_id and a password. System check whether the username is unique. After signing up, the user will be received a email notification and a account will be created. 

Authentication

User can log in to her account at anytime using her username and password. After performing tasks she can log out from our account.


Note

User can create text notes/lists and more. She can keep note of anything she likes. A note consists of a heading, content, date and time. She can also keep lists/checklists/ to-do-list etc. A list also consists of a heading, content, date and time. She can mark list item as done or undone. She can edit note/list. Every Note has a note_id. 

Attachment

User can add attachment with the note. There are two types of Attachment, file and image. She can also delete any attachment. User can attach upto a maximum size of file/image predefined by the system. System fetch the Attachment (files and images) using the attachment_source_path. Attachment has an attachment_name and an attachment_id. 

Tag

User can add tag/s to every notes/lists. Tag/s refers to the keyword/s of that content. A note/list may have multiple tags. All headings are meant to be tags by default. User can edit tag. User can search note/list by using tag/s. 

Task

User can set personal task. She can set the task’s heading, description, comment, status, deadline. She can also set shared task with other account. This shared task notification will be sent to the respective user’s mail. Respective user/s can also update any kind of task’s attributes like task’s deadline, status, comment. And it will be recommended that she should comment by using her username to specifying the recent status of the task. User also can edit task. Every task has a task_id.  

Reminder

User can set reminder for an event/occurrence using date and time. She also can set a reminder for a specific note/list or task A email is being sent to the user at the given date and time to remind him. User can also set multiple reminders at a time. She also can set periodic reminders in the basis of hour/day/week/month. She can edit reminder. Every reminder has a reminder_id. 

Synchronization

This application will be auto synchronized its content. It  will also be synchronized with clock and date. It updates and generates notes’/lists’ date and time automatically. 

