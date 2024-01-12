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

#---Navigate to Employee Management---#

#Find the Employee Management Button 
employee_nav_button = driver.find_element(By.CSS_SELECTOR, 'a.btn.btn-primary[href="./Employees.php"]')
#Click the Employee Management Button Button
employee_nav_button.click()
#Wait for 3 seconds
time.sleep(3)

#---Remove the Employee---#
#Navigate to remove an employee
employee_remove_button = driver.find_element(By.CSS_SELECTOR, 'a.btn.btn-primary[href="./Employee-Removal.php"]')
#Click Employee Remove button
employee_remove_button.click()
#Wait for 3 seconds
time.sleep(3)
#Click remove on the employee
remove_employee = driver.find_element(By.XPATH, '/html/body/div/div/div[2]/div/table/tbody/tr[3]/td[6]/a')
remove_employee.click()
#Wait for 3 seconds
time.sleep(3)
#Click confirm on the pop up 
# Switch to the alert
alert = driver.switch_to.alert
# Accept the alert (click "OK")
alert.accept()
#Wait for 3 seconds
time.sleep(3)

#Will always be the last thing the driver does 
driver.quit()