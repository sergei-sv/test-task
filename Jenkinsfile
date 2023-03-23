pipeline {
    agent any

    stages {
        stage('Checkout Code') {
            steps{
                git branch: 'main',
                    url: 'https://github.com/sergei-sv/test-task.git'        
            }
        }
        stage ("Lint Dockerfile") {
            agent {
                docker {
                    image 'hadolint/hadolint:latest-debian'
                }
            }
            steps {
                    sh 'hadolint src/Dockerfile | tee -a hadolint_lint.txt'
            }
            post {
                always {
                    archiveArtifacts 'hadolint_lint.txt'
                }
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
                sh 'docker run -d -p 8200:80 --name d-image sergeis8v/jenkins-images:${BUILD_NUMBER}'
                sh" sed -i 's/latest/${BUILD_NUMBER}/' deployment.yaml"
                sleep 5 
                sh 'wget http://localhost:8200'
                sh 'cat index.html'
                sh "docker stop d-image"
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
        stage('Deploy in pre-prod') {
            steps {
                withKubeConfig([credentialsId: 'k8s-cred-sergeis8v', serverUrl: 'https://192.168.59.101:8443']) {
                sh "kubectl apply -f deployment.yaml -n pre-prod"
                sleep 5
                sh "kubectl get pods -n pre-prod"
                }
            }
        }
        stage('Slack Pre-Prod Notification') {
            steps {
                slackSend (color: '#00FF00', message: """Deployment to namespace pre-prod is Successful!
  The pipeline has been suspended. Please continue the process in the web interface""")
            }
        }
        stage('Deploy in prod. Cleaning pre-prod') {
            steps{
                script {
                    catchError(buildResult: 'SUCCESS', stageResult: 'FAILURE'){
                        def check_depl = true
                        try{
                            input("Deploy in prod?")
                        }
                        catch(err){
                            check_depl = false
                        }
                        try{
                            if(check_depl){
                                withKubeConfig([credentialsId: 'k8s-cred-sergeis8v', serverUrl: 'https://192.168.59.101:8443']) {
                                sh 'kubectl delete -f deployment.yaml -n pre-prod'
                                sh 'kubectl apply -f deployment.yaml -n prod'
                                sleep 5
                                sh 'kubectl get pods -n prod'
                                }
                            }
                        }
                        catch(Exception err){
                            error "Deployment failed"
                        }
                    }
                }
            }
        }
        stage('Delete docker image locally') {
            steps{
                sh 'docker rmi sergeis8v/jenkins-images:${BUILD_NUMBER}'
            }
        }
    }
    post {
        success {
            slackSend (color: '#00FF00', message: "Deployment to prod was Successful! \nPipeline: '${env.JOB_NAME} [${env.BUILD_NUMBER}]'")
        }
        failure {
            slackSend (color: '#FF0000', message: "Deployment to prod was Failed! \nPipeline: '${env.JOB_NAME} [${env.BUILD_NUMBER}]'")
        }
    }
}
    




