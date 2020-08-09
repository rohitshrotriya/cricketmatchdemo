# cricketmatchdemo
## Project Login
UserName:rohitadmin@yopmail.com
password:password

##Project Setup
import the sql file provided in the root project folder testcriclaravel.sql in the database mysql.
create a .env file renaming .env.example and set the following :-
APP_KEY=base64:55RE8WME7T/yGjfngQ6gr+qRoIuJrOYxY3edKAz9mgA=

also update database details and other parameters as required. 

## About Laravel 5.8

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

## Problem Statement 
(Time Duration – 8 hours): 

Context: Our system has the data of the cricket teams, its players, matches, points table)

 

Structure of Team:
identifier 
name
logoUri

Club state

Structure of Player:
identifier
firstName
lastName
imageUri

Player jersey number

Country

Player history (matches, run, highest scores, fifties, hundreds, etc..)

Matches

Matches between the teams

Winner of the match

Points table

Get points between the teams.


Story: As a user I want a list of the Teams Which are present in our system and When I click on the Team I would want to see the Team Name along with the list of players of that Team.

Random choose matches between all team (fixtures)

 

Points between the team


Acceptance Criteria:
1. Team list should consist of <logo>, <Team Name>
2. Players list should consist of <image>, <lastName> <firstName>

3. Matches fixtures 

4. Points 

 

 Expectation: 

1. Use OOPs Concepts.

2. Forms, SQLs generation are native framework code (Yii, laravel)

3. Code as if it can be deployed to production (secured from sqlinjection and other types of hacks).

4. Must Follow solid principles.

 

 Evaluation Criteria:

 

This Application will be evaluated on the following based on this priority.

1. Coding / Design Style (Object Oriented)

2. Logic

3. Output

4. Testability (Unit Test Cases and TDD)

5. Solid principle

 

 If you use REST and Angular it’s added advantages

 

Note:

 

Code transparently. In case if you use any API/code from internet, please mention upfront or else please do not use anything from internet.
## Project Assumptions and Flow

This project is about maintaining the data about cricket teams, players and their histories, fixtures/matches, and tournaments' points table.

It is assumed that teams have a Club/State to which they belong and textual entry is saved into the database as no further details are mentioned in the Problem statement.

It is assumed that each player may play for a single team per tournament and in another tounrmanet his team may be different. This is because a team may belong to club/state of the same country or region to which player belongs. But as no further explanations are provided into the problem statement so is the reason for this assumption.

It is assumed that multiple attributes can be added for player history in future and hence it is made configurable through attributes table and all such attributes will have single value per player as no further details are mentioned in the Problem statement.

It is assumed that each match has a level like 'Round 1', 'Round 2', 'Semi Final', 'Final' etc. For this levels table is created and the same is used as foreign key in fixtures table.

In case there is no winner then winner_id in fixtures table will be null. In case there is a winner then points mentioned in tournaments table per match will be alotted to that team and is saved in points table.

Player history and attributes to be created and saved into DB manually.
Algorithm for fixtures generation will be written inside PHP script and will be executed once a tournament and its team and its players are created and entered into the Database.

Min 4 teams are required for tounament.
Net runrate in points table not included because it was out of scope as per problem statment and time duration given.

Fixture Start and end date will be selected sequentially for round-1 matches (only single round is assumed alons with 2 semi finals and final match) and the dates are choosen in incremental manner starting from current date. semi final and final match dates will be after one day gap is chosen.

Only insertion or create forms are built for demo of this test case or problem statement for the following: -
Team 
Tournaments,
Players,
History of players. (No listing of history is shown as there was no mention of the same is there in problem statment)

Please use only integral points per match in tournament creation form. And follow the below below sequence for testing: -
1. Create Torunament
2. Create Team
3. Create Players. Optionaly Add History
4. Add/Attach Torunament to Teams(min 4) as well as add Players to the team. (Note: A player can play from different teams in different tournaments but in a single tournament he will play from a single team only.)
5. Create fixtures (as per above mentioned details that will be created).
6. Select winner teams and optinally add decsciption in Result fixtures section. (When all the winners are updated then semi final teams will be automatically updated and displayed. Same happens for final i.e. when all the finals result are decided and winner is updated then final match teams are updated. Similarly when final match is decided and winner updated then Winner of the tournament is updated and displayed in points table. Points table are updated at all times when the winners are updated in result fixtures section i.e. when form is saved after selecting one or more winners for round 1/semi final/final matches.)

Note: For semi finals top four teams as per points table are chosen so that first team will play with 4th team and second semi final will be played by 2nd and 3rd team. No tie or Run rate like duckward lewis system currently implemented as this is out of scope for the problem statment and the time duration given.
 

