use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PDFController extends Controller
{
    public function guardarPDF(Request $request)
    {
        if ($request->hasFile('pdf_file') && $request->file('pdf_file')->isValid()) {
            // Define la subcarpeta dinámica en la que se guardará el PDF
            $subfolder = $request->input('subfolder');

            // Verifica si la subcarpeta existe o créala si es necesario
            if (!Storage::exists($subfolder)) {
                Storage::makeDirectory($subfolder);
            }

            // Define el nombre del archivo
            $file_name = 'documento.pdf';

            // Guarda el archivo en la ruta específica
            $request->file('pdf_file')->storeAs($subfolder, $file_name);

            return "El archivo PDF se guardó con éxito en $subfolder/$file_name";
        } else {
            return "No se recibió un archivo PDF válido.";
        }
    }
}