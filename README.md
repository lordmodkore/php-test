
# Monolithic Structure

To avoid duplicated code, consider moving the News class to a separate file, e.g., 
News.php. This will make the code more modular and easier to maintain.

# Lack of Namespaces

Introduce namespaces to organize classes and avoid name collisions.

# Poor Separation of Concerns
Refactor the CommentManager and NewsManager classes to separate business logic from database operations. Consider using a repository pattern:


# Direct SQL Execution
Use prepared statements or an ORM (Object-Relational Mapping) library to prevent SQL injection attacks. For example, with PDO:


# Hardcoded Database Credentials

Use environment variables to store your database credentials.

Create a configuration file, e.g., config.php, to store your database credentials.

# Singleton Pattern Misuse

Avoid using the singleton pattern for managing instances.
Use dependency injection to manage instances. added `composer` for dependency injection.
run `composer install` to insert dependency.