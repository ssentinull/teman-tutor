API Documentation:

Add User
---
### POST: '/users'
- Header: -
- Body: email, password, name, gender(string), birth_date(date), address
- Return Format: json
- Data returned:  email, name, gender, birth_date, address, created_at, updated_at
- Controller Used: UsersController
- Method Called: add(Request $request)

View a Single User
---
### GET: '/users/{id}'
- Header: -
- Body: -
- Return Format: json
- Data returned:  id, email, name, gender, birth_date, address, created_at, updated_at
- Controller Used: UsersController
- Method Called: view($id)

View the Groups that a User is enrolled in
---
### GET: '/users/{id}/groups'
- Header: remember_token
- Body: -
- Return Format: json-array
- Data returned:  id, name, desc, course_id, created_at, updated_at
- Controller Used: UsersController
- Method Called: groups($id)

Edit a Single User
---
### PUT: '/users/{id}'
- Header: remember_token 
- Body: email, password, name, gender(string), birth_date(date), address
- Return Format: json
- Data returned:  id, email, name, gender, birth_date, address, created_at, updated_at
- Controller Used: UsersController
- Method Called: edit(Request $request, $id)

Delete a Single User
---
### DELETE: '/users/{id}'
- Header: remember_token 
- Body: -
- Return Format: json
- Data returned:  'Removed Succesfully'
- Controller Used: UsersController
- Method Called: delete($id)

View All Users
---
### GET: '/users'
- Header: - 
- Body: -
- Return Format: json-array
- Data returned:  id, email, name, gender, birth_date, address, created_at, updated_at
- Controller Used: UsersController
- Method Called: allUsers()

Add a Group
---
### POST: '/groups'
- Header: remember_token 
- Body: name, desc, course_id
- Return Format: json
- Data returned:  
	from Groups Table;
		id, name, desc, course_id, created_at, updated_at
	from Group_User Table;
		id, user_id, is_admin, is_accepted, created_at, updated_at
- Controller Used: GroupsController
- Method Called: add(Request $request) (the request should also include the $id of the User who created the Group)

View a Single Group
---
### GET: '/groups/{id}'
- Header: -
- Body: -
- Return Format: json
- Data returned: id, name, desc, course_id, created_at, updated_at
- Controller Used: GroupsController
- Method Called: view($id)

View all the Users that belong to a Single Group
---
### GET: '/groups/{id}/users'
- Header: -
- Body: -
- Return Format: json-array
- Data returned: id, email, name, gender, birth_date, address, remember_token, created_at, updated_at
- Controller Used: GroupsController
- Method Called: users($id)

Edit a Single Group
---
### PUT: '/groups/{id}'
- Header: remember_token
- Body: name, desc, course_id
- Return Format: json
- Data returned: id, name, desc, course_id, created_at, updated_at
- Controller Used: GroupsController
- Method Called: edit(Request $request, $id)

Delete a Single Group
---
### DELETE: '/groups/{id}'
- Header: remember_token
- Body: -
- Return Format: json
- Data returned: "Removed Successfully"
- Controller Used: GroupsController
- Method Called: delete($id)

View All Groups
---
### GET: '/groups'
- Header: remember_token
- Body: -
- Return Format: json-array
- Data returned:  id, name, desc, course_id, created_at, updated_at
- Controller Used: UsersController
- Method Called: allGroups()

A User wants to Join a Group
---
### POST: '/groups/{group_id}/{user_id}'
- Header: remember_token
- Body: -
- Return Format: json
- Data returned:  group_id, user_id, is_admin = 0, is_accepted = 0 (data is fetched from Group_User Table)
- Controller Used: UsersController
- Method Called: addUser($group_id, $user_id)

A User is Accepted to a Group
---
### PUT: '/groups/{group_id}/{user_id}'
- Header: remember_token
- Body: -
- Return Format: json
- Data returned:  group_id, user_id, is_admin = 0, is_accepted = 1 (data is fetched from Group_User Table)
- Controller Used: UsersController
- Method Called: acceptUser($group_id, $user_id)

A User is Set to be an Admin of a Group
---
### PUT: '/admin/{group_id}/{user_id}'
- Header: remember_token
- Body: -
- Return Format: json
- Data returned:  group_id, user_id, is_admin = 1, is_accepted = 1 (data is fetched from Group_User Table)
- Controller Used: UsersController
- Method Called: setAdmin($group_id, $user_id)

Remove a User from a Group
---
### DELETE: '/groups/{group_id}/{user_id}'
- Header: remember_token
- Body: -
- Return Format: json
- Data returned: "Removed Successfully"
- Controller Used: UsersController
- Method Called: removeUser($group_id, $user_id)

A User wants to Login to his/her Account
---
### POST: '/auth'
- Header: -
- Body: email, password
- Return Format: json
- Data returned:  id, email, name, gender, birth_date, address, remember_token, created_at, updated_at 
- Controller Used: AuthentificationsController
- Method Called: login(Request $request)

A User wants to Logout to his/her Account
---
### POST: '/auth/{id}'
- Header: remember_token
- Body: -
- Return Format: json
- Data returned:  "Logout Successful" 
- Controller Used: AuthentificationsController
- Method Called: logout($id)

Add a Course
---
### POST: '/courses'
- Header: - 
- Body: name, desc
- Return Format: json
- Data returned: id, name, desc, created_at, updated_at
- Controller Used: CoursesController
- Method Called: add(Request $request)

View a Course
---
### GET: '/courses/{id}'
- Header: - 
- Body: -
- Return Format: json
- Data returned: id, name, desc, created_at, updated_at
- Controller Used: CoursesController
- Method Called: view($id)

View the Groups that studies a particular Course
---
### GET: '/courses/{id}/groups'
- Header: - 
- Body: -
- Return Format: json-array
- Data returned: id, name, desc, course_id, created_at, updated_at (data is fetched from Groups Table)
- Controller Used: CoursesController
- Method Called: groups($id)

Edit a Course
---
### PUT: '/courses/{id}'
- Header: - 
- Body: name, desc
- Return Format: json
- Data returned: id, name, desc, created_at, updated_at
- Controller Used: CoursesController
- Method Called: edit(Request $request, $id)

Delete a Course
---
### DELETE: '/courses/{id}'
- Header: - 
- Body: -
- Return Format: json
- Data returned: "Removed Successfully"
- Controller Used: CoursesController
- Method Called: delete($id)

View all of the Courses
---
### GET: '/courses'
- Header: - 
- Body: -
- Return Format: json-array
- Data returned: id, name, desc, created_at, updated_at
- Controller Used: CoursesController
- Method Called: allCourses()

