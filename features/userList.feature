Feature: List Users
  In Order To List Existing User
  As A Member
  I Need To Be Able To See Users With All Personal Information
  @1
  Scenario: Get All Existing User Successfully
    Given I am a member
    And I have created user with email "azar@email.com" and phone "09397730108"
    And I have created user with email "babak@email.com" and phone "09127730108"
    When I open endpoint '/api/users'
    And send "GET" request
    Then I should receive ok
    And receive JSON response:
        """
        {
          [{
          "id" : 1,
          "email" : "azar@email.com",
          "phone" : "09397730108",
          },
          {
          "id" : 2,
          "email" : "babak@email.com",
          "phone" : "09127730108",
          }
          ]
        }
        """

  Scenario: Filter Between Existing User Successfully
    Given I am a member
    And I have created user with email "azar@email.com" and phone "09397730108"
    And I have created user with email "babak@email.com" and phone "09127730108"
    When I open endpoint '/api/users?email=azar'
    And send "GET" request
    Then I should receive ok
    And receive JSON response:
        """
        {
          [{
          "id" : 1,
          "email" : "azar@email.com",
          "phone" : "09397730108"
          }
          ]
        }
        """