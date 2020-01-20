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