#Import Selenium and the chrome driver
from selenium import webdriver 
driver = webdriver.Chrome()
#Website url that the driver will access
website_url = "http://localhost/lvl6-php-a2/index.php"
#Takes driver to the website
driver.get(website_url)

#---Begin Testing---#

#---Register an account---#

#---Log in with that account---#

#---Logout---#

#---Log in with Admin Account---#






#Will always be the last thing the driver does 
driver.quit()