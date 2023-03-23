pipeline {
    agent any

    stages {
        stage('Checkout Code') {
            steps{
                git branch: 'main',
                    url: 'https://github.com/sergei-sv/test-task.git'        
            }
        }
        stage('Validate Dockerfile') {
            steps{
                sh 'docker run --rm -i hadolint/hadolint < Dockerfile'
            }
        }
        stage('Build Docker image') {
            steps{
                dir('src') {
                    sh 'docker build -t sergeis8v/jenkins-images:${BUILD_NUMBER} .'
                }
            }
        }
        stage('Test Docker image') {
            steps {
                sh 'docker run -d -p 80 sergeis8v/jenkins-images:${BUILD_NUMBER}'
                sh" sed -i 's/latest/${BUILD_NUMBER}/' deployment.yaml"
                sleep 10 
                sh 'curl http://localhost:80'
            }
        }
        stage('Push Docker image to DockerHub') {
            steps{
                withDockerRegistry(credentialsId: 'dockerhub-cred-sergeis8v', url: 'https://index.docker.io/v1/') {
                    sh '''
                        docker push sergeis8v/jenkins-images:${BUILD_NUMBER}
                    '''
                }
            }
        }
        stage('Delete docker image locally') {
            steps{
                sh 'docker rmi sergeis8v/jenkins-images:${BUILD_NUMBER}'
            }
        }
    }
}