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

#Will always be the last thing the driver does 
driver.quit()