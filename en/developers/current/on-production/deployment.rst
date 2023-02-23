Deployment
==========

Deployment of the system can be carried out in several ways. You can use the built-in Deployer
mechanism that automates the entire process of website deployment and publication on the target server.
You can manually copy the files to the destination server. And you can also plug in the deployment
process in the CD, for example in Gitlab - nothing difficult - Tulia CMS is based on Symfony,
so the whole process looks mostly the same as any application based on Symfony.

Configuration for a production environment
#########################################

Tulia CMS requires that the ``.env.prod`` file exists in the production environment. It should contain
the environment variables for the production environment. It is especially required for Deployer -
without it the deployer will not work.

In this file, place the configuration of the database and other services on the production environment.
Additionally, remember to set the correct variables ``APP_ENV=prod`` and ``APP_DEBUG=false``.

Deployer
########

`Deployer <https://deployer.org/>`_ is a tool written in PHP, which is designed to automate the
deployment of small and medium-sized applications. It connects to the target server via SSH and
performs deployment.

One of its advantages is automation and zero-downtime deployment. You can read more about it at
`https://deployer.org <https://deployer.org/>`_. This is the recommended deployment method because
Tulia CMS already has a deployer configuration for many shared hostings.

Deployer initialization
___________________

To use the Deployer, you must initialize it. First, we'll add it to the project's dependencies:

.. code-block:: terminal

    make composer require deployer/deployer

Now we will initialize the deployer to work with the system. Execute the following command and select
the target hosting on which you will server the application.

.. code-block:: terminal

    make console make:deployer

.. tip:: Info

    If it does not exist, select the ``custom`` option and manually configure the deployer according
    to its documentation.

Performing the deployment
_____________________

Now that we have the Deployer configured, it's time for the deployment itself. To do it, just run the
command below.

.. code-block:: terminal

    make deploy

.. tip:: Info

    During the first deployment, when there is no file structure on the server yet and the database is
    empty, the Deployer will ask if you want to synchronize the database and files in the ``/public``
    directory. Answer these questions ``Yes`` and the Deployer will send the current version of all data
    from your computer to the target server. With each subsequent deployment, this data will not be
    synchronized.

Manual deploy and CD
##################

To perform a manual or CD deployment, please refer to the
`Symfony <https://symfony.com/doc/current/deployment.html>`_ documentation. However, there is one
thing that needs to be done in addition. This is the ``make console assets:publish`` command, which
is responsible for publishing system resources/assets and extensions to the ``/public`` directory.
