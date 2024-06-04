# Use the official Tomcat image as the base image
FROM tomcat:10.1-jdk17

# Update package lists and install MySQL client
RUN apt-get update && apt-get install -y mysql-client && apt-get install -y vim

# Remove the default ROOT webapp
RUN rm -rf /usr/local/tomcat/webapps/ROOT

# Copy the WAR file to the Tomcat webapps directory
COPY target/spring-boot-thinkerhouse-web.war /usr/local/tomcat/webapps/ROOT.war

# Expose the port Tomcat is running on
EXPOSE 8080

# Run Tomcat
CMD ["catalina.sh", "run"]