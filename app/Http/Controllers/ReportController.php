<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Dompdf\Dompdf;
use Illuminate\Http\Response;


class ReportController extends Controller
{
    public function generateUserReport()
    {
        $users = DB::table('users')->select('id', 'name', 'email')->get();

        $pdf = new Dompdf();
        $pdf->loadHtml(view('report/UserReportpdf', ['users' => $users])->render());
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();
    
        $pdfContent = $pdf->output();

        $response = new Response($pdfContent);
        $response->header('Content-Type', 'application/pdf');
        $response->header('Content-Disposition', 'attachment; filename="UserReport.pdf"');
    
        return $response;
    }

    public function generateBlogReport()
    {
        $blogs = DB::table('blogs')->select('id', 'title', 'content')->get();

        $pdf = new Dompdf();
        $pdf->loadHtml(view('report/BlogReportpdf', ['blogs' => $blogs])->render());
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();
    
        $pdfContent = $pdf->output();

        $response = new Response($pdfContent);
        $response->header('Content-Type', 'application/pdf');
        $response->header('Content-Disposition', 'attachment; filename="BlogReport.pdf"');
    
        return $response;
    }

    public function generateFormReport()
    {
        $contact = DB::table('contact')->select('id', 'name', 'email', 'content')->get();

        $pdf = new Dompdf();
        $pdf->loadHtml(view('report/ContactReportpdf', ['contact' => $contact])->render());
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();
    
        $pdfContent = $pdf->output();

        $response = new Response($pdfContent);
        $response->header('Content-Type', 'application/pdf');
        $response->header('Content-Disposition', 'attachment; filename="ContactReport.pdf"');
    
        return $response;
    }

    public function generateNewsReport()
    {
        $newsletter = DB::table('newsletter')->select('email')->get();

        $pdf = new Dompdf();
        $pdf->loadHtml(view('report/NewsletterReportpdf', ['newsletter' => $newsletter])->render());
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();
    
        $pdfContent = $pdf->output();

        $response = new Response($pdfContent);
        $response->header('Content-Type', 'application/pdf');
        $response->header('Content-Disposition', 'attachment; filename="NewsletterReport.pdf"');
    
        return $response;
    }


}
