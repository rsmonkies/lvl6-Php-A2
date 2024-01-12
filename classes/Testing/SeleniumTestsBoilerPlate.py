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