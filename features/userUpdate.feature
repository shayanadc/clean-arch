Feature: Update User With Details Information
  In Order To Update User Information In Application
  As A Member
  I Need To Be Able To Change User Personal Information
  Scenario: Update Existing User Successfully
    Given I am a member
    And I have created user with email "azar@email.com" and phone "09397730108"
    When I open endpoint '/api/users/1'
    And fill the form with:
      """
       {
        "phone" : "09127730108",
        "fname" : "azar",
        "lname" : "h",
        "password": "password",
        "password_confirmation" : "password"
      }
        """
    And send "PUT" request
    Then I should receive ok
    And receive JSON response:
        """
        {
          "id" :1,
          "email" : "azar@email.com",
          "phone" : "09127730108",
          "fname" : "azar",
          "lname" : "h"
       }
        """
  @2
  Scenario: Failed Updating For Non Existing User
    Given I am a member
    When I open endpoint '/api/users/1'
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
    And send "PUT" request
    Then I should receive not ok
    And receive JSON response:
      """
          {
            "errors": [{
              "title": "User Not Found."
              }]
          }
      """