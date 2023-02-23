Installation
============

You will learn how to install Tulia CMS locally in two steps to be able to start working.
To be able to work with Tulia CMS, make sure you have the following requirements installed.

.. tip:: Requirements

    You need:

    - Git
    - Docker + Docker Compose 2.*
    - Terminal access

1. Project installation
#######################

Clone project with git:

.. code-block:: terminal

    $ git clone --depth=1 https://github.com/tuliacms/tuliacms.git && rm ./tuliacms/.git -rf
    $ cd tuliacms

2. System configuration
#######################

Execute the following command and answer the questions that will allow you to initial setup
and start the system.

.. code-block:: terminal

    $ make setup

3. Ready to work
################

The system is available at http://localhost/.

Read more
_____________

- :doc:`Makefile commands <makefile-commands>`
