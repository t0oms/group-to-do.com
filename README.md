# group-to-do.com

The main functionality of this website is to allow users to create groups where they assign each other tasks. Tasks are assigned in the form of "to-dos," which are meant for a specific user. Each to-do consists of a title, a short description, the user who created the to-do, and the user for whom the to-do is intended.

## Dashboard
When entering the website, the user sees a dashboard that contains all the groups in which the user is a member. Groups created by this user are highlighted in green.

![1  dashboard view](https://github.com/t0oms/group-to-do.com/assets/66429919/797e6b81-27c0-4e24-b122-46851ff4d5e6)

### New Group

By clicking on the "New Group" button, a form opens where the name of the new group must be specified. When the "Create" button is clicked, a new group empty group with no other members is created and added to their dashboard.

![2  create group view](https://github.com/t0oms/group-to-do.com/assets/66429919/b9d2cf19-94e5-4ee5-962d-706ae3c598f8)

### Invites

From the dashboard, the user can access the invites page, where they can see all of the invites to other groups sent to them.

![3  invites view](https://github.com/t0oms/group-to-do.com/assets/66429919/e4b43187-6d3c-45ef-bd06-f31778a80b76)

## Groups

### To-Dos
When clicking on a group, the first thing the user sees is a list of all the group's to-dos. Highlighted in red are all the to-dos meant for this user.

![4  undone todos view 1](https://github.com/t0oms/group-to-do.com/assets/66429919/0fb556be-6d44-470c-9356-ac1f18be53eb)

Users create new to-dos by clicking on the "Create To-Do" button at the bottom of the page. When clicking on the button, the "Create To-Do" form opens. The user must give the to-do a name, a short description, and choose a member of the group for whom the to-do is intended. After clicking the "Create" button, the new to-do is added to the list of the group's to-dos.

![5  todo create form view](https://github.com/t0oms/group-to-do.com/assets/66429919/ba8c5c4b-cdf1-476e-8c14-b3d07cb292b9)

Highlighted in green are all the to-dos created by this user. Users can delete or edit the to-dos they have created.

![6  undone todos view 2](https://github.com/t0oms/group-to-do.com/assets/66429919/e315645b-229d-468f-b55c-d1bd8ce0b3a1)

When the user completes a to-do assigned to them, they can check it off, and the completed to-do is moved to the "Done To-Dos" section. In the "Done To-Dos" section, users see all the completed to-dos, and they can also uncheck the done to-dos to move them back to the undone "To-Dos" section.

![7  done todos](https://github.com/t0oms/group-to-do.com/assets/66429919/f6789520-a84e-4490-b601-e52b6b0a4eca)

The creator of the group has the ability to delete or edit all of the group's to-dos. Here is an image of the list of all the to-dos from the group creator's perspective.

![8  undone todos admin view](https://github.com/t0oms/group-to-do.com/assets/66429919/27d9738c-9579-4609-8bcb-d7c1cc3aa812)

### Group Members
By clicking on the "Group Members" section of the group, users can see all the group's members.

![9  member view](https://github.com/t0oms/group-to-do.com/assets/66429919/93df6a49-f3cb-4613-b528-9e4aeece0f05)

The group creator has the ability to remove or add group members.

![10  member admin view](https://github.com/t0oms/group-to-do.com/assets/66429919/790f1198-25cc-44d4-85ea-71953a3a3536)

By clicking on the "Invite Members" button, the "Add Users" form opens, where the user searches for the user they would like to invite.

![11  invite member view](https://github.com/t0oms/group-to-do.com/assets/66429919/6fb18a7b-dc1d-4ef9-8314-61e7483a42f8)

## Info

- This project was developed by Toms Pētersons.
- The project was created as the final project for the University of Latvia's Web Technologies II course.
- Main technologies used: Laravel, MySQL, Tailwind
