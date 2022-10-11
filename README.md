# Dietitian Content Management System (DCMS)


# Currently rearrainging routes, So, few routes might break. Preparing it for developing API and turning it into a SPA with Vue Js.  (6/8/2020)










| Basic Documentation |
| :-----------------: |



| Page Name              |                           Function                           |     Connected Page Name      |                           Function                           | Note                                                         |
| ---------------------- | :----------------------------------------------------------: | :--------------------------: | :----------------------------------------------------------: | ------------------------------------------------------------ |
| Diet Requests          |                      Shows All Request                       |        Request a Diet        |                      Requesting a diet                       | Create Diet option is only available via diet request. It can not be accessed directly. |
| Diet Drafts            |           Showing list of drafts with edit option.           |         Create Diet          |                             ---                              | Save as draft option is available on create/ edit diet page via draft edit / create dirt button |
| All Records            | It shows you all kinds of transaction records. You can also download it in multiple formats. |             N/A              |                             N/A                              |                                                              |
| Diet Records           | It shows you diet records & also gives you an option to detach a diet. |        Diet Requests         |                      Requesting a diet                       | If you click on detach diet button.<br/>The Detached diet will be sent back to the diet requests page as requests. <br/><br/>But the patient's personal information won't be available . Only transaction-related info will be shown now.<br/><br/>Now you can rewrite the diet chart and send it back to the client again. |
| Appointments & Serials |             All Appointment Transaction Records              |         Appointment          | The patient can make an appointment for himself from this page. | You can also update the transaction payment status from here. The transaction must be approved before dealing with the appointment / diet request. |
| Accounts               |            You can create / edit / delete account            |             N/A              |                             N/A                              |                                                              |
| All Articles           |                             ---                              |       Home Page ( / )        |                             N/A                              |                                                              |
| Write Blog             |                             ---                              | Home Page ( / ) & Categories |                             N/A                              |                                                              |
| Categories             |                             ---                              |          Write Blog          |                             N/A                              |                                                              |
| Gallery                |                             ---                              |       Home Page ( / )        |                             N/A                              |                                                              |
| About                  |                             ---                              |       Home Page ( / )        |                             N/A                              |                                                              |
| Chamber Details        |                             ---                              |       Home Page ( / )        |                             N/A                              |                                                              |
| Social Links           |                             ---                              |       Home Page ( / )        |                             N/A                              |                                                              |
| Events                 |                             ---                              |       Home Page ( / )        |                             N/A                              |                                                              |
| Payment History        |                     Transaction history                      |                              |                                                              | This page is viewable / accessible by patients only.         |
| Medical Form           |                   A medical history form.                    | Profile ( Patient Profile )  |                                                              | After filling up the medical form, medical history data appears on the profile page. |
| Profile                |  This page is viewable by the paitent account holder only.   |                              |                                                              |                                                              |



**Database**

* **Database design normalized up to NF-3 form.** 
* You can use MySQL workbench to reverse engineer this database to see its **EER Diagram**.
* In the transactions table, I broke the normalization law **a tiny bit** to avoid creating a small relationship table. 
* Because relational queries cost higher than a simple column with a few repetitive words.
* I used MySQL Workbench to design the database.



**Technology used**

- Laravel 8



**Note**

- Home page pagination is made with raw JavaScript. 
- I know a better way of creating pagination in JavaScript for Laravel now. 
- But I don't want to refactor the old dummy project.



**Pattern used**

- Repository pattern is used. 

**Known Bugs**

- Payment History (MySQL Query)
- In a few places, I forget to put a flash session for showing flash massage after the CRUD operation.



**Note** 

- I am not going to fix these minor bugs at all. It's just a dummy project.
- Spending time fixing bugs in this dummy project is a waste of time.


 

 **Custom License**

- You are only allowed to use it for your own learning purpose in a non-commercial & private manner.
- You are not allowed to reupload this project or a customized version of it anywhere.

 

 

 

 

