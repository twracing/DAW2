
# Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
# Click nbfs://nbhost/SystemFileSystem/Templates/Other/Dockerfile to edit this template

FROM maven:3.9.4-eclipse-temurin-21 AS build

# Directorio de trabajo
WORKDIR /app
COPY pom.xml .
COPY src ./src

# Compilar + ejecutar tests + generar jar
RUN mvn -B clean package


# Etapa 2: Imagen final (solo Java Runtime)
FROM eclipse-temurin:21-jre



# Copiar el .jar generado en la etapa de construcción
COPY --from=build /app/target/proyecto2-1.0-SNAPSHOT.jar proyecto2.jar
# Ejecutar la aplicación
ENTRYPOINT ["java", "-jar", "proyecto2.jar"]