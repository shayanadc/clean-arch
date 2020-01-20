Feature: Register User With Details Information
  In Order To Create New User In Application
  As A Member
  I Need To Be Able To New User With Personal Information

  Scenario: Create New User Successfully
    Given I am a member
    When I open endpoint '/api/users'
    And fill the form with:
      """
       {
        "email" : "azar@email.com",
        "phone" : "09397730108",
        "fname" : "shayan",
        "lname" : "h",
        "password": "password",
        "password_confirmation" : "password"
      }
        """
    And send "POST" request
    Then I should receive ok
    And receive JSON response:
        """
        {
          "id" :1,
          "email" : "azar@email.com",
          "phone" : "09397730108",
          "fname" : "shayan",
          "lname" : "h"
       }
        """

  Scenario: Failed Registration For Duplicate Email
    Given I am a member
    And I have created user with email "babak@email.com"
    When I open endpoint '/api/users'
    And fill the form with:
      """
       {
        "email" : "babak@email.com",
        "phone" : "09397730108",
        "fname" : "babak",
        "lname" : "b",
        "password": "password",
        "password_confirmation" : "password"
      }
        """
    And send "POST" request
    Then I should receive not ok
    And receive JSON response:
      """
          {
            "errors": [{
              "title": "The email has already been taken.",
              "source" : {
                 "parameter": "email"
               }
              }]
          }
      """