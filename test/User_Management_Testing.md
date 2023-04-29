# Testing Documentation for User Management Module
## Test Plan
- To ensure the correctness and robustness of our software, we conducted both white-box testing and black-box testing. 
- All the testings were performed manually and were recorded accordingly.
- All the test paths in white-box testing were aimed to cover the four test selection criteria.
- All the test cases in black-box tesing were aimed to cover the functionalities in our software.
- All the test results were observed by our tester directly.
- Below are the details of our testing.
- Each test path include the event sequence path, and  execution result.
- Each test case include the path of operation, input, expected behavior, and actual behavior.

### White-box Testing
*Entry: http://34.237.159.19/bigBang/user/Welcome.html*
*Exit could be logout or entering game module*
- Path 1: Entry -> 1 -> 2 -> 5 -> 8 -> 5 -> 9 -> 2 -> 4 -> 2 -> 3 -> 7 -> 12 -> 17 -> Exit
- Path 2: Entry -> 1 -> 2 -> 3 -> 7 -> 12 -> 17 -> Exit
- Path 3: Entry -> 1 -> 2 -> 3 -> 6 -> 11 -> 6 -> 10 -> Exit
- Path 4: Entry -> 1 -> 2 -> 3 -> 7 -> 13 -> 7 -> 14 -> 7 -> 15 -> 7 -> 16 -> Exit
### Black-box Testing
- Test 