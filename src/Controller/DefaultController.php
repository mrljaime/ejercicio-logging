<?php
/**
 * @author José Jaime Ramírez Calvo <mr.ljaime@gmail.com>
 * @version 1
 * @since 1
 */

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class DefaultController
 * @package App\Controller
 */
class DefaultController extends AbstractController
{
    /**
     * @param LoggerInterface $logger
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function indexAction(Request $request, LoggerInterface $logger)
    {
        foreach ($request->headers as $key => $value) {
            $logger->debug(sprintf(
                '%s - %s',
                var_export($key, true),
                var_export($value, true)
            ));
        }

        return $this->json([
            'code'  => Response::HTTP_OK,
            'data'  => "I'm the logging project"
        ]);
    }
}