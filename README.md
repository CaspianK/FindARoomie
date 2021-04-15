<p align="center"><img src="https://i.ibb.co/x5qLZBL/Find-ARoomie.png" alt="Find-ARoomie" border="0"></p>

## Description

FindARoomie! helps people to find roommates. So if a person has a spare room to share and wants to earn some money, they can post their room on the site so that other people who need an apartment but want to save money can see it and contact the owner. A user can create a profile, create and post a room, bookmark a room and see their bookmarked rooms later, see profiles of other people and see rooms of other people. A user can also specify the city they are interested in, as well as they can choose between two languages: English and Kazakh (Latin).

## ERD

<p align="center"><img src="https://i.ibb.co/9wzMjXb/ERD.png" alt="ERD" border="0"></p>

There are six tables in the project: users, profiles, rooms, photos, cities and bookmakrs. A user can have at most one profile, but profile must have one user. Profile might have a room, but each room has one profile. Room also has a city and photos. User might have zero or more bookmarks, but bookmark can only have one user as well as it can only have one room, while room can be in many bookmarks. Relations present: Users-Bookmarks (One-to-Many), Users-Profiles (One-to-One), Profiles-Rooms (One-to-One), Rooms-Photos (One-to-Many), Rooms-Bookmarks (One-to-Many) and Cities-Rooms (One-to-Many).
