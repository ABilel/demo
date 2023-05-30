<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class WebhookController extends AbstractController
{
    public function handleWebhook(): Response
    {
        // // Get the payload and signature from the request
        // $payload = $request->getContent();
        // $signature = $request->headers->get('X-Hub-Signature-256');

        // // Perform signature verification and other checks (as shown in the previous code examples)

        // // Verify the secret
        // $expectedSignature = 'sha256=' . hash_hmac('sha256', $payload, 'boilerplate');
        // if ($signature !== $expectedSignature) {
        //     return new Response('Invalid signature', 403);
        // }

        // // If signature verification and other checks are successful, execute the deploy.sh script
        // $output = shell_exec('/bin/bash ../../deploy.sh');

        $output = shell_exec('/bin/bash ../deploy.sh 2>&1');
        var_dump($output);
        // // Capture and log the output for debugging purposes
        // file_put_contents('../../deploy.log', $output . PHP_EOL, FILE_APPEND);
        

        // Handle the output or error messages from the script execution as needed
        if ($output === null) {
            return new Response('Deployment failed', 500);
        } else {
            return new Response('Deployment successful');
        }
    }
}
