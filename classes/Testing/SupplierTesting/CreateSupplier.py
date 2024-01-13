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

#---Navigate to supplier management---#

#Click the supplier Management Button
supplier_management_nav_button = driver.find_element(By.CSS_SELECTOR, 'a.btn.btn-primary[href="./Suppliers.php"]')
#Click on the button
supplier_management_nav_button.click()
#Wait for 3 seconds
time.sleep(3)

#---Navigate to Supplier add---#

#Click the Supplier add Button
supplier_add_management_nav_button = driver.find_element(By.CSS_SELECTOR, 'a.btn.btn-primary[href="./Suppliers-Add.php"]')
#Click on the button
supplier_add_management_nav_button.click()
#Wait for 3 seconds
time.sleep(3)

#---Input supplier Name---#
#supplier name input field 
#find the element by its id
name_input = driver.find_element(By.ID, 'supName')
#Input a value into the name text box
name_input.send_keys('A Company')
#Wait for 3 seconds
time.sleep(3)

#---Input supplier email---#
#supplier email input field 
#find the element by its id
email_input = driver.find_element(By.ID, 'email')
#Input a value into the email text box
email_input.send_keys('acompany@gmail.cm')
#Wait for 3 seconds
time.sleep(3)

#---Input supplier phone number---#
#supplier phone number input field 
#find the element by its id
number_input = driver.find_element(By.ID, 'phoneNumber')
#Input a value into the name text box
number_input.send_keys('12345678912')
#Wait for 3 seconds
time.sleep(3)

#---submit---#
#Click the submit button
submit_supplier_add = driver.find_element(By.CLASS_NAME, 'btn.btn-primary.btn-lg.w-100.mb-4')
submit_supplier_add.click()
#Should redirect to Suppliers.php
#Wait for 3 seconds
time.sleep(3)


#Will always be the last thing the driver does 
driver.quit()