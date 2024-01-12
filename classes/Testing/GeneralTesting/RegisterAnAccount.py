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

#Will always be the last thing the driver does 
driver.quit()