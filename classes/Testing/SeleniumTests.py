#Import Selenium and the chrome driver
from selenium import webdriver 
from selenium.webdriver.common.by import By
import time
driver = webdriver.Chrome()
#Website url that the driver will access
website_url = "http://localhost/lvl6-php-a2/index.php"
#Takes driver to the website
driver.get(website_url)
#Wait for 3 seconds
time.sleep(3)

#---Begin Testing---#

#---Register an account---#
#Finds the login button by it's class name and href element
login_button = driver.find_element(By.CLASS_NAME, 'nav-link[href="./login.php"]')
#Click on the login button
login_button.click()
#Wait for 3 seconds
time.sleep(3)
#Finds the register button by its css attributes and its href
register_button = driver.find_element(By.CSS_SELECTOR, 'a.btn.btn-secondary.btn-lg.w-100[href="./register.php"]')
#Click on the register button
register_button.click()
#Wait for 3 seconds
time.sleep(3)
#Begin to fill in user details

#First name input field 
#find the element by its id
fname_input = driver.find_element(By.ID, 'fname')
#Input a value into the first name text box
fname_input.send_keys('Selenium')
#Wait for 3 seconds
time.sleep(3)
#Surname input field 
sname_input = driver.find_element(By.ID, 'sname')
#Input a value into the surname text box
sname_input.send_keys('testing')
#Wait for 3 seconds
time.sleep(3)
#Email input field 
email_input = driver.find_element(By.ID, 'email')
#Input a value into the email text box
email_input.send_keys('selenium@test.com')
#Wait for 3 seconds
time.sleep(3)
#Password input field
pass_input = driver.find_element(By.ID, 'password')
#Input a value into the password text box
pass_input.send_keys('Selenium123!')
#Wait for 3 seconds
time.sleep(3)
#Password verification input field
passV_input = driver.find_element(By.ID, 'password-v')
#Input a value into the password verify text box
passV_input.send_keys('Selenium123!')
#Wait for 3 seconds
time.sleep(3)
#Find register button to register the account
register_account_button = driver.find_element(By.CLASS_NAME, 'btn.btn-primary.btn-lg.w-100.mb-4')
#Click on register account button 
register_account_button.click()
#Wait for 3 seconds
time.sleep(3)

#Will be taken to login form automatically

#---Log in with that account---#

#Input the same values that were just registered into the log in form
#Email input field
email_login_input = driver.find_element(By.ID, 'email')
#Input the same Email that was regsitered
email_login_input.send_keys('selenium@test.com')
#Wait for 3 seconds
time.sleep(3)
#Password input field
pass_login_input = driver.find_element(By.ID, 'password')
#Input the same password that was registered
pass_login_input.send_keys('Selenium123!')
#Wait for 3 seconds
time.sleep(3)
#Find the login button to log the user in
login_account_button = driver.find_element(By.CLASS_NAME, 'btn.btn-primary.btn-lg.w-100.mb-4')
#Click the login button 
login_account_button.click()
#Wait for 3 seconds
time.sleep(3)

#Will be taken to index.php automatically 

#---Logout---#

#Find the logout button on index.php
#Will have the same attributes as the log in button 
logout_button = driver.find_element(By.CLASS_NAME, 'nav-link[href="./logout.php"]')
time.sleep(3)
#Click the logout button
logout_button.click()
#Wait for 3 seconds
time.sleep(3)
#User is logged out
#Logout button should change back to Login 
#Welcome message will change from users name to 'member'

#---Log in with Admin Account---#

#Log back in but with the admin account 
#Finds the login button by it's class name and href element
login_button = driver.find_element(By.CLASS_NAME, 'nav-link[href="./login.php"]')
#Click on the log in button
login_button.click()
#Wait for 3 secconds
time.sleep(3)

#Input the details to log in as admin 
#Email input field
email_login_input = driver.find_element(By.ID, 'email')
#Input the same Email that was regsitered
email_login_input.send_keys('admin@admin.com')
#Wait for 3 seconds
time.sleep(3)
#Password input field
pass_login_input = driver.find_element(By.ID, 'password')
#Input the same password that was registered
pass_login_input.send_keys('Admin123!')
#Wait for 3 seconds
time.sleep(3)
#Find the login button to log the user in
login_account_button = driver.find_element(By.CLASS_NAME, 'btn.btn-primary.btn-lg.w-100.mb-4')
#Click the login button 
login_account_button.click()
#Wait for 3 seconds
time.sleep(3)

#---Navigate to inventory---#

#Find the Inventory Button
inv_nav_button = driver.find_element(By.CLASS_NAME, 'nav-link[href="./Inventory.php"]')
#Click the Inventory Button 
inv_nav_button.click()
#Wait for 3 seconds
time.sleep(3)

#---Navigate to Category---#

#Find the Category Button 
category_nav_button = driver.find_element(By.CSS_SELECTOR, 'a.btn.btn-primary[href="./Categories.php"]')
#Click the Category Button
category_nav_button.click()
#Wait for 3 seconds
time.sleep(3)

#---Create a Category---#

#Navigate to the create category page 
create_category_nav_button = driver.find_element(By.CSS_SELECTOR, 'a.btn.btn-primary[href="./Category-Add.php"]')
#Click the add category button
create_category_nav_button.click()
#Wait for 3 seconds
time.sleep(3)
#Category name input field
category_name_input = driver.find_element(By.ID, 'name')
#Input category name into name field
category_name_input.send_keys('selEnIum')
#Wait for 3 seconds
time.sleep(3)
#Image input field 
category_image_input = driver.find_element(By.ID, 'image')
#Input image address into field
category_image_input.send_keys('https://www.perfecto.io/sites/default/files/image/2020-09/social-blog-what-to-expect-with-selenium-2.jpg')
#Wait for 3 seconds
time.sleep(3)
#Find Submit button
category_add_submit_button = driver.find_element(By.CLASS_NAME, 'btn.btn-primary.btn-lg.w-100.mb-4')
#Click submit button
category_add_submit_button.click()
#Should Navigate back to Category Page
#Wait for 3 seconds
time.sleep(3)

#---Edit the Category---#

#Navigate to edit category 
#Find the edit category button
edit_category_nav_button = driver.find_element(By.CSS_SELECTOR, 'a.btn.btn-primary[href="./Category-Edit.php"]')
#Click on the edit category button
edit_category_nav_button.click()
#Wait for 3 seconds
time.sleep(3)
#Find the edit button 

#Wait for 3 seconds
time.sleep(3)

#---Navigate to Supplier---#

#---Create a Supplier---#

#---Edit the Supplier---#

#---Navigate to Inventory Management---#

#---Create a piece of Invenotry---#

#---Edit that inventory---#

#---Navigate to Supplier to check the stock has been added---#

#---Navigate to Inventory Management---#

#---Remove that inventory---#

#---Navigate to Supplier---#

#---Remove Supplier---#

#---Navigate to Category---#

#---Remove Category---#

#---Navigate to Employee Management---#

#---Edit Role for Selenium Account to be Admin---#

#---Log out of Admin Account---#

#---Log in with selenium account---#

#---Navigate to inventory---#
#Check that the Admin dashboard is there

#---Log out of selenium account---#

#---Log in with Admin Account---#

#---Navigate to Employee Management---#

#---Edit Role of Selenium back to Employee---#

#---Remove Selenium Account---#

#---Log out---#

#---Try Log in with selenium account---#



#Will always be the last thing the driver does 
driver.quit()