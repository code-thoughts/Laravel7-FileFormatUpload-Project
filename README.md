# Laravel7-FileFormatUpload-Project
<b>Test Question</b><br>
This test assess your ability to work with various data formats both
as input and output, as well as your ability to interact with a MySQL database.

You can use the PHP framework that you are most comfortable with.

Requirements:<br>
Build a file uploader that accepts a CSV, JSON or XML file only and creates a table in a
database with columns that match the structure of the uploaded file, and imports the
file’s data into the table. The table’s name should be the name of the file (without the
extension and in snake case).
Once the data has been imported the user should be able to view the contents of the
table and download the data as an Excel or PDF file.
As many of the components as possible should follow the reusable design pattern.

<b>Test answer and installation requirements</b>

1.Creat a laravel project<br> 
2.Create the database that you will be using and edit the env file in your project in Mysql section with the details of your database..username and password.<br>
3.Migrate data and current tables to your database.<br>
4.Add scaffolding  with vue to be able to login and register for authentication.<br>
5.Run npm install and npm run dev to compile.<br>
6.Cd to your project and proceed with the following.<br>
7.Copy data from the project files into your project and the best guide for this is the web.php under routes,which has the routes to the pages ,functions and packages used.<br>

<b>Packages used are:</b><br>
1.composer require maatwebsite/excel(for exporting to excel from database table)
2.composer require barryvdh/laravel-dompdf(for exporting pdf from database table)
3.The created export files are found in App/Exports,these files are also included in the fileuploadcontroller where most of the application logic is.

<b>Software used:</b><br>
1.Linux ubuntu OS(18.04)<br>
2.LAMP installed,to get phpmyadmin and the mysql database<br>
3.Editor-Visual studio code<br>
4.Also included in this project are the four files for the purpose of testing and creating according to the test question<br>

<b>Few notes on the thought process:</b><br>
1.Identify the standard structure of the different file formats<br>
2.Find out how to read and extract the data from the file,using the required programming language.<br>
3.Identify the keys of the different file structures and make these the column/fields.<br>
4.Adjustments can be made for a particular file as it comes, or what ever the standard is used and needed at that time.<br>
5.Example in the case of csv, comma separated value file, first line is almost always the headings , as the file is being read, you can get the number of fields as well as the number of rows.
While the rows are being counted, use the first row to create the table fields/columns including the id field, then go to the second row and start to insert data(I say insert, but it is more updating were the id is equal to the row you are inserting into) from the second column, where the id is the row number which you have to declare at the beginning.  using a for loop you insert data in the different fields starting from column 1 for every row not column 0(id), while iteration.<br>
<b>Still working on improving this answer abit more</b><br>

<b>02 November 2021</b>
<i>Made a change to one of the blades exporting pdf from view List.blade.php,data was not correctly aligned.<br>
with first row and row printed on following page not aligned.
  <b>Logic</b>,<br>to see the number of rows that each page could accommodate before printing on next page.
I made the first row empty before the foreach and added an if statement to check once the certain number of rows was reached and then after which another empty row was added going to the next page of the pdf, so that all rows added would display correctly on pdf.working on more solutions.</i>

