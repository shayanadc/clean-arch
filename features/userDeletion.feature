Feature: Delete User From App
  In Order To Delete Existing User From Application
  As A Member
  I Need To Be Able To Delete Account With Personal All Information

  Scenario: Remove Softly Existing User Successfully
    Given I am a member
    And I have created user with email "azar@email.com"
    When I open endpoint '/api/users/1'
    And send "DELETE" request
    Then I should receive ok
    And receive JSON response:
        """
        {
          "message" : "user deleted successfully"
        }
        """

  Scenario: Failed To Remove Not Existing User
    Given I am a member
    When I open endpoint '/api/users/1'
    And send "DELETE" request
    Then I should receive not ok
    And receive JSON response:
      """
          {
            "errors": [{
              "title": "User Id Not Found.",
              }]
          }
      """