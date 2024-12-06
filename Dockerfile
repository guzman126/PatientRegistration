FROM yiisoftware/yii2-php:8.2-apache

# Install supervisor
RUN apt-get update && apt-get install -y supervisor && rm -rf /var/lib/apt/lists/*

# Create Supervisor configuration directory
RUN mkdir -p /etc/supervisor/conf.d

# Copy Supervisor configuration
COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Set the working directory
WORKDIR /app

# Expose the web server port
EXPOSE 80

# Start Supervisor
CMD ["supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]
