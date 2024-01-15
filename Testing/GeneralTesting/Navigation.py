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

#---Navigate to Home---#

#Click the nav button labeled Home
home_nav_button = driver.find_element(By.CLASS_NAME, 'nav-link[href="./index.php"]')
#Click on the home button
home_nav_button.click()
#Wait for 3 seconds
time.sleep(3)

#---Navigate back to inventory---#

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

#---Navigate to inventory Add---#

#Click the inventory Management Button
inventory_management_add_nav_button = driver.find_element(By.CSS_SELECTOR, 'a.btn.btn-primary[href="./add-inventory.php"]')
#Click on the button
inventory_management_add_nav_button.click()
#Wait for 3 seconds
time.sleep(3)

#---Navigate to inventory edit---#

#Click the inventory Management Button
inventory_management_nav_button = driver.find_element(By.CSS_SELECTOR, 'a.btn.btn-primary[href="./edit-inventory.php"]')
#Click on the button
inventory_management_nav_button.click()
#Wait for 3 seconds
time.sleep(3)

#---Navigate to inventory remove---#

#Click the inventory Remove Button
inventory_management_remove_nav_button = driver.find_element(By.CSS_SELECTOR, 'a.btn.btn-primary[href="./inventory-removal.php"]')
#Click on the button
inventory_management_remove_nav_button.click()
#Wait for 3 seconds
time.sleep(3)

#---Navigate to home---#

#Click the company name to go home
branding_home_nav_button = driver.find_element(By.CSS_SELECTOR, 'a.navbar-brand[href="index.php"]')
#Click on the home button
branding_home_nav_button.click()
#Wait for 3 seconds
time.sleep(3)

#---Navigate to inventory---#

#Find the Inventory Button
inv_nav_button = driver.find_element(By.CLASS_NAME, 'nav-link[href="./Inventory.php"]')
#Click the Inventory Button 
inv_nav_button.click()
#Wait for 3 seconds
time.sleep(3)

#---Navigate to employee management---#

#Click the employee Management Button
employee_management_nav_button = driver.find_element(By.CSS_SELECTOR, 'a.btn.btn-primary[href="./Employees.php"]')
#Click on the button
employee_management_nav_button.click()
#Wait for 3 seconds
time.sleep(3)

#---Navigate to employee edit---#

#Click the employee edit Button
employee_edit_management_nav_button = driver.find_element(By.CSS_SELECTOR, 'a.btn.btn-primary[href="./Employee-Roles-Edit.php"]')
#Click on the button
employee_edit_management_nav_button.click()
#Wait for 3 seconds
time.sleep(3)

#---Navigate to employee remove---#

#Click the employee removal Button
employee_remove_management_nav_button = driver.find_element(By.CSS_SELECTOR, 'a.btn.btn-primary[href="./Employee-Removal.php"]')
#Click on the button
employee_remove_management_nav_button.click()
#Wait for 3 seconds
time.sleep(3)

#---Navigate to home---#

#Click the company name to go home
branding_home_nav_button = driver.find_element(By.CSS_SELECTOR, 'a.navbar-brand[href="index.php"]')
#Click on the home button
branding_home_nav_button.click()
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

#---Navigate to supplier add---#

#Click the supplier add  Button
supplier_add_management_nav_button = driver.find_element(By.CSS_SELECTOR, 'a.btn.btn-primary[href="./Suppliers-Add.php"]')
#Click on the button
supplier_add_management_nav_button.click()
#Wait for 3 seconds
time.sleep(3)

#---Navigate to supplier edit---#

#Click the supplier edit Button
supplier_edit_management_nav_button = driver.find_element(By.CSS_SELECTOR, 'a.btn.btn-primary[href="./Suppliers-Edit.php"]')
#Click on the button
supplier_edit_management_nav_button.click()
#Wait for 3 seconds
time.sleep(3)

#---Navigate to supplier remove---#

#Click the supplier Management Button
supplier_management_nav_button = driver.find_element(By.CSS_SELECTOR, 'a.btn.btn-primary[href="./Supplier-Removal.php"]')
#Click on the button
supplier_management_nav_button.click()
#Wait for 3 seconds
time.sleep(3)

#---Navigate to home---#

#Click the company name to go home
branding_home_nav_button = driver.find_element(By.CSS_SELECTOR, 'a.navbar-brand[href="index.php"]')
#Click on the home button
branding_home_nav_button.click()
#Wait for 3 seconds
time.sleep(3)

#---Navigate to inventory---#

#Find the Inventory Button
inv_nav_button = driver.find_element(By.CLASS_NAME, 'nav-link[href="./Inventory.php"]')
#Click the Inventory Button 
inv_nav_button.click()
#Wait for 3 seconds
time.sleep(3)

#---Navigate to category management---#

#Click the category Management Button
category_management_nav_button = driver.find_element(By.CSS_SELECTOR, 'a.btn.btn-primary[href="./Categories.php"]')
#Click on the button
category_management_nav_button.click()
#Wait for 3 seconds
time.sleep(3)

#---Navigate to category add---#

#Click the category add Button
category_add_management_nav_button = driver.find_element(By.CSS_SELECTOR, 'a.btn.btn-primary[href="./Category-Add.php"]')
#Click on the button
category_add_management_nav_button.click()
#Wait for 3 seconds
time.sleep(3)

#---Navigate to category edit---#

#Click the category edit Button
category_edit_management_nav_button = driver.find_element(By.CSS_SELECTOR, 'a.btn.btn-primary[href="./Category-Edit.php"]')
#Click on the button
category_edit_management_nav_button.click()
#Wait for 3 seconds
time.sleep(3)

#---Navigate to category remove---#

#Click the category remove Button
category_remove_management_nav_button = driver.find_element(By.CSS_SELECTOR, 'a.btn.btn-primary[href="./Category-Remove.php"]')
#Click on the button
category_remove_management_nav_button.click()
#Wait for 3 seconds
time.sleep(3)

#---Navigate to home---#

#Click the company name to go home
branding_home_nav_button = driver.find_element(By.CSS_SELECTOR, 'a.navbar-brand[href="index.php"]')
#Click on the home button
branding_home_nav_button.click()
#Wait for 3 seconds
time.sleep(3)


#Will always be the last thing the driver does 
driver.quit()