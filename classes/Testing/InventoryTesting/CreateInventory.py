#Import Selenium and the chrome driver
from selenium import webdriver 
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import Select
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

#---Navigate to inventory management---#

#Click the inventory Management Button
inventory_management_nav_button = driver.find_element(By.CSS_SELECTOR, 'a.btn.btn-primary[href="./edit-inventory.php"]')
#Click on the button
inventory_management_nav_button.click()
#Wait for 3 seconds
time.sleep(3)

#---Navigate to Inventory add---#

#Click the Inventory add Button
inventory_add_management_nav_button = driver.find_element(By.CSS_SELECTOR, 'a.btn.btn-primary[href="./add-inventory.php"]')
#Click on the button
inventory_add_management_nav_button.click()
#Wait for 3 seconds
time.sleep(3)

#---Input Item Name---#
#item name input field 
#find the element by its id
name_input = driver.find_element(By.ID, 'name')
#Input a value into the name text box
name_input.send_keys('Wa1eRmeLon')
#Wait for 3 seconds
time.sleep(3)

#---input item description---#
#item description input field 
#find the element by its id
desc_input = driver.find_element(By.ID, 'description')
#Input a value into the name text box
desc_input.send_keys('Large and green')
#Wait for 3 seconds
time.sleep(3)

#---input item image address---#
#item image input field 
#find the element by its id
img_input = driver.find_element(By.ID, 'image')
#Input a value into the name text box
img_input.send_keys('https://assets.sainsburys-groceries.co.uk/gol/6411148/1/640x640.jpg')
#Wait for 3 seconds
time.sleep(3)

#---select supplier---#
#Click the drop down to choose a supplier
supplier_dropdown = Select(driver.find_element(By.ID, 'supplier'))
#Select multiple options to test they work 
supplier_dropdown.select_by_visible_text('the farm')
#Wait for 3 seconds
time.sleep(3)

#---select category---#
#Click the drop down to choose a category
category_dropdown = Select(driver.find_element(By.ID, 'category'))
#Select multiple options to test they work 
category_dropdown.select_by_visible_text('Fruit')
#Wait for 3 seconds
time.sleep(3)

#---submit---#
#Click the submit button
submit_inventory_add = driver.find_element(By.CLASS_NAME, 'btn.btn-primary.btn-lg.w-100.mb-4')
submit_inventory_add.click()
#Should redirect to Inventory.php
#Wait for 3 seconds
time.sleep(3)

#Will always be the last thing the driver does 
driver.quit()