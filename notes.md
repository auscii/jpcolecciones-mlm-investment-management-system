Live website: https://www.jpcolecciones.com/


ACCOUNTS
--------------------------------------------
FOR WEBSITE
https://www.jpcolecciones.com/shop/wp-login.php
username: qy4jyd
password: v`kA}~4JgNv>
--------------------------------------------
FOR MEMBER
https://www.jpcolecciones.com/account/
username: webmobileappdeveloper@gmail.com
password: BfMFh56z
--------------------------------------------
FOR ADMIN
https://www.jpcolecciones.com/account/admin/
username: admin@admin.com
password: admin
--------------------------------------------
MODIFICATIONS (Remaining balance 18K):
• Add delete button beside Activation button on Member Activation - DONE
• Add delete button also for Member Wallet Geneology page (https://www.jpcolecciones.com/account/admin) - DONE
• Remove the X icon to hide container pages in Member maintenance page
• Update to readonly the sponsor id on referral.php
• Video tutorial
--------------------------------------------
COMMON
<?php
$az1n1 = "299187122" ;
$az1n2 = "3fxfC1230" ;
$serverdirectory="https://jpcolecciones.com/account/" ;
$serveremail="support@jpcolecciones.com" ;

$host="localhost"; // Host name 
$username="jpcmasteruser"; // Mysql username 
$password="DQH&Z!lu7Vwb"; // Mysql password 
$database="jpcmlmsystem"; // Database name 
 
($GLOBALS["___mysqli_ston"] = mysqli_connect($host, $username, $password));
@((bool)mysqli_query($GLOBALS["___mysqli_ston"], "USE " . $database)) or die ("Unable to select database");

?>
--------------------------------------------
JPC NEED TO TEST BEFORE VIDEO DEMO
- Transaction History
- Messages on top nav (try to send messages using Admin account)
- Announcement on top nav (try to update announcement details using Admin account)
--------------------------------------------
Demo Tutorial Scope:
• MEMBER (Link: https://www.jpcolecciones.com/account/)
    • Registration
    - Discuss input fields 
        - Sponsor ID is unique dont include special characters or spaces
        - Referral Bonus For Package is connected on Commission Rates

    - After member registration, you will receive email verification on your email address. You need to click the verification link and proceed to login page

    - Email Video attachment is configurable in Admin "Set Email Video"

    • Login
    - After checking verification link, member should upload proof of photo and invoice photo. Otherwise, member will stay inactive. 
      (Please note that Admin will not activate member account until he the member/user is not uploading his POP and Invoice photo)

    - If the member/user is not yet Activated by Admin, main menu will not be visible for on his end

    • Profile
    - You can see all personal user information and Investment Status
        - Investment Amount value is depending on your selected Membership Plan (e.g. Referral Bonus for Package 1/2/3/4/5) upon registration. 
          See admin > Commision Rates page for more info.
        - Stock Wallet Balance, Stock Bonus, Special Bonus is depending on your transaction and will be discuss later.

    • Upload Profile Photo
    - You can change your profile photo in the System and this is different from photo id on the other page.

    • Upload Proof of Payment
    - Change Personal ID Photo and Invoice Photo will be customize and this is required and must click the upload button to save your image. 
      Otherwise, you will not be activated in the System.

    • Edit Profile
    - As you can see on the Profile page, by default and new register user, phone input field is blank and you can update/add personal information like Phone, Gender, etc.

    • Change Password
    - You can change password and re-type password for confirmation and update to save changes to your user account.

    • Referral Link
    - You can copy + paste the referral link in order to recruit other members by clicking the Copy button or highlight the URL and paste it into your friends and other social media(s).

    • Withdrawal Payout
    - Amount of payout to be withdrawn is depending on your Current External Wallet Balance, All inputs are required except for the Member ID input field (Member ID is shown on the Profile page), 
      not unless you will be transfer your Wallet Balance into another Member account and just type the Member ID and click Save button.

    - You will receive an email after you request Withdrawal Payout

    - Basis is "Current External Wallet Balance" - (minus) "Current Withdrawable Balance" and please note that you can withdraw payout unless you have 1,000.00 PHP and above. Otherwise, 1,000.00 below will not be withdrawn on your balance account and it should approve by 
      Admin user after you process or Withdrawal Payout.

    • Genealogy history and Investment history
    - This will be populated transaction(s) only if you refer new member using the Referral Link that we discuss earlier.

    • Transaction history
    - This is consider as your Inventory and/or Transaction Lists where you can see all the Transactions that you made and it includes Date/Time, Description, IN and OUT PHP.


• ADMIN (Link: https://www.jpcolecciones.com/account/admin/)
- admin user is 1 account only
    • Dashboard
    - Where you can see all the Total investments, Total stock wallets, Total external wallet, Total members that made on the Web Application System

    - Monthly Investment Recap for this current year (2021) is depending on the Investment monthly. You can click the reload button to refresh the page

    • Member Activation
    - Admin user can activate member user account(s) by clicking the Activation button and will be reflected only if the Member is already "Active" Status and
      uploaded his/her Proof of Photo (POP) and Invoice Photo (POP), else, prompt alert will be shown in the System and saying "ID or Invoice Proof of Payment (POP) is incomplete or missing!".

    - Please note that Member Activation page has Pagination in the lower left below (e.g. 1, 2, 3, etc) to next/previous page (only if, there are many users in the System).

    • Member Wallet Genealogy
    - First thing first, you need to click the "Filter Member" button and select your desired to process member wallet. After that, click the button of "Process Member - {member name} Wallet" 
      and prompt alert confirmation will be shown and you will see the summary of his details and click "Process" button to save changes.

    • Payout Withdrawal Approval
    - When Member user process his/her Withdrawal Payout on his account, payout withdrawal request by member will be populated on Payout Withdrawal Approval on Admin page.

    - Please note that Admin user need to Process the Withdrawal Payout of member before the process make updated. Click the button Process to save changes.

    • Send Package Funds
    - Enter the "Amount to Send" and select Package 1 and it will be sent into Member(s) External Wallet Balance after you click the button of "Send" to save changes.

    • Transfer Funds
    - Direct transfer funds to Member Wallet Balance account

    - Please note that all members with stock wallet balance above 100 can transfer funds only

    • Commission Rates
    - Admin can Update Membership Plans (Referral Bonus For Package 1, 2, 3, 4, and 5)

    • Currency Settings
    - Admin can Update Currency Value, Prefix, Symbol and Wallet Maintaining Balance

    • Set Announcements 
    - Send an announcement on members and will be shown in top navigation bar.

    • Set Email Video 
    - Admin can update Email video attachment when member verify user account on his/her email account. Just type copy and paste the youtube embed link.

    • Message Members
    - Admin can send message individually and enter message depending on selected member.

    • Change Admin Password
    - Update admin password and its very important to remember his Admin password.


• jpcolecciones Admin Website (Link: https://www.jpcolecciones.com/shop/wp-login.php)
- Where you can customize your Shop Website

- Users in jpcolecciones shop website is not the same with membership account website -> https://www.jpcolecciones.com/account/

- Administrator can add more users using this link -> https://www.jpcolecciones.com/shop/wp-admin/users.php 
  or check the side menu > Users > All users

- Products is also customization and allow you to View, Add, Delete and edit product(s). Just go to Products > All Product


• Shop Main Website (Link: https://www.jpcolecciones.com/shop/)
- Landing/Main Wesite of JP colecciones







