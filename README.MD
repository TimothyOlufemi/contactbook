
# Contact Book Project by Timothy

 This README file will explain the database structure and how the project works.

## A. Setup the Project
To setup the project for use the database needs to be set up first
  * In the project folder is an SQL file named "**phonebook.sql**" you can import that file into your MYSQL server and the database and all other tables in the database will be created automatically after importing
  * Then you can load up the page in your server by typing "**YOUR_DIRECTORY**/**phonebook**/"

## B. Database Structure

 The database 'phonebook' has multiple tables that stores the informations about the contacts 

 1. The '*stored_contacts*' table
    This table houses information about any new contact added to the phonebook.
	Informations like
	- The Contacts Name
	- Email
	- Gender
	- Office Address
	- Phone Number
	- Icon Background Color
	- Date of Creation

 2. The '*stored_groups*' table  
    This table saves every contact group name only that will be created in the phonebook. Every other information about the contacts in the group is stored separately.

## C. Flow Design
   * A user to opens the phonebook and meet the user-friendly dashboard interface with already saved contacts alphabetically displayed as a list on the screen.
   * The user can see buttons and helpful tips to navigate through the project.
   * The user can **Add** a new contact by clicking on the "Add New Contact" button at the top of the page.
   * The user can sort the contact list in order of date
   * The user can also search by various methods including
  		- Firstname or Lastname
  		- Email Address, and
  		- Phone Number
   * The user can **View** saved information about the contact by clicking the view button which will produce a modal dialog displaying the saved information about the contact.
   * The user can **Edit** informations about the saved contact by clicking on the Edit button on the list.
   * The user can also **Delete** unwanted contacts from the list by clicking on the delete button.
   * The user can create new contact groups at the left section of the home page by clicking on the "New Group" button. A modal dialog will prompt the user for the name of the group in which the user is expected to type in the name and click on the "Add" button to save the group.
   * If the user has once created a group, the groups will be displayed in the contact group section of the page and also indicating the number of contacts present in the group.
   * Each contact group can be accessed by clicking on the group in the contact group section of the page.
   * In Each contact group page the contacts added will be listed and if there are none the user can add contacts to the group by clicking on the "Add to /Group Name/ " button.
   * The user can also make modifications to the group by clicking on the configure button at the top and the user can decide to either change the group name or to delete the group.

## D. Folder Structure
The project has various folders to store various files in their respective locations 
	* The "**app**" folder consist of the project's Model, Views, and Controllers

	* The "**config**" folder consist of the config.php file that set some constants in the operations of the projects

	* The "**css**" and "**js**" folder have in them the stylesheet and javascript files respectively for the project




