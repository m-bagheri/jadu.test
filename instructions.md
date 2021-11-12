
How to install?

Follow the below commands in order to set this project up

1. `git clone git@github.com:m-bagheri/jadu.test.git`
2. `cd jadu.test`
3. `composer install`
4. `npm install`
5. `npm run build`
6. `bin/console server:run`

It's all now setup and ready to use. You should be able to access it via your web browser by heading to:
`http://127.0.0.1:8000`


NOTE: the `.env` file is committed to the git. This is a security issue, and we should avoid doing this in real world projects. Because this is a test repo and it's just for demonstration, I've committed `.env` file as well to simplify it for the user to run the web app with lowest code changes.