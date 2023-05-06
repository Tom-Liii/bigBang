# bigBang - v0.0
- CSCI3100_Project_gobang
- This is the GitHub repository of CSCI3100 project group D3  

## Group Member: 
- LI Heming
- LI Houting
- NING Chenyu
- POON Yong Xian

# Description
We are developing a online gobang application with *big* features. 

# Link to Our Game
- http://34.237.159.19/bigBang/user/Welcome.html
- Since we are using Apache2 server to serve our Application on an AWS EC2 instance, the time and resource of the server are limited. Hence our website will be down periodically and we cannot handle too many request at the same time, we hope to fix those issues in futher. 

## Requirements
### User Requirements
- Web browser such as Chrome, Safari and so on.

### Developer Requirements
> Due to the resource limitation of AWS instance, we decided to distribute our project into 2 Linux Ubuntu Server so that we can improve the responsiveness and robustness of both server. Thanks to the modularity of our application, we can deploy the user management module in one of the server and game module in another server. 
> You can try out our project by git clone this repo into two different AWS server that configure with the following packages. 
**The version of each application is not strictly limited, developer can employ any version to rebuild our game as long as the system works**
- Requirements for the first server
    - Server: Ubuntu 22.04.2 LTS
    - Allow public http access
    - Host: Apache/2.4.52 (Ubuntu)
    - Database: mysql  Ver 8.0.32-0ubuntu0.22.04.2 for Linux on x86_64 ((Ubuntu))
    - PHP Version => 8.1.2-1ubuntu2.11
        packages: 
        - mysqlnd 8.1.2-1ubuntu2.11
- Requirements for the first server
    - Server: Ubuntu 22.04.2 LTS
    - Allow public http access
    - Python Version: 3.7
        - daphne: 3.0.2

# For the lastest updates and bugs fixing, please see the pull request and issue sections
