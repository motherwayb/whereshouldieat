
*******************
Setting Up Local Git Repo
*******************

Open Terminal and change directory to where your local files are stored and run the following commands:

* ``git init``
* ``git add .``
* ``git commit -m "First commit"``
* ``git remote add origin https://github.com/motherwayb/whereshouldieat.git``
* ``git push -u origin master``

**************************
Making Changes
**************************

Once you're up and running you can make changes by doing the following:

* ``git fetch && git checkout -b my-branch-name`` (where my-branch-name is replaced by a descriptive name of the branch)

Once you're on the branch you can make as many local changes as you want. When you're happy with all your changes and you want to push them to main branch run the following:

* ``git add .``
* ``git commit -m "added my cool new changes yada yada yada"`` (where the message in quotes is a description of what you did)
* ``git push``

NOTE: if you're pushing for the first time you may need to run:

* ``git push --set-upstream origin my-branch-name``
* Once you've done that click `New Pull Request <https://github.com/motherwayb/whereshouldieat/pull/new/master>`_.
* Make sure Base branch is set to Master and Compare branch is set to your new branch (my-branch-name)
* Once you do this you should see your changes
* Then click "create pull request" button
* You should then see your pull request
* Once you see it, click "merge pull request"
* Et Voila! Your pull request has been merged into the master branch
