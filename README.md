### Development
To run the container for development simply run this command:

```docker compose up --build```

To run the container for development with hot reload:

```docker compose up --watch```

### Database changes
If you have made changes to the database, such as if you modified the included `init.sql` file, you must delete the volume associated with the container:

```docker compose down -v```

The next time you run `docker compose up` the volume with be recreated using the contents of the `init.sql` file. 