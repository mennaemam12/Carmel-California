import os
import platform
import subprocess
import urllib.request

def download_webp_tools():
    # Download WebP tools based on the operating system
    system_platform = platform.system().lower()

    if system_platform == "linux":
        download_url = "https://storage.googleapis.com/downloads.webmproject.org/releases/webp/index.html"
        print("WebP tools download URL:", download_url)
        # You should replace the above URL with the actual URL for your platform.

    elif system_platform == "darwin":
        download_url = "https://storage.googleapis.com/downloads.webmproject.org/releases/webp/index.html"
        print("WebP tools download URL:", download_url)

    elif system_platform == "windows":
        download_url = "https://storage.googleapis.com/downloads.webmproject.org/releases/webp/index.html"
        print("WebP tools download URL:", download_url)

    else:
        print("Unsupported operating system:", system_platform)
        return

    # Download and extract WebP tools
    # (You need to replace this part with the actual download and extraction logic)

    print("Downloading and installing WebP tools...")

def convert_to_webp(input_folder, output_folder):
    # Convert all images in the input folder to WebP format
    for filename in os.listdir(input_folder):
        if filename.lower().endswith((".jpg", ".jpeg", ".png")):
            input_path = os.path.join(input_folder, filename)
            output_path = os.path.join(output_folder, os.path.splitext(filename)[0] + ".webp")

            # Run cwebp command for conversion
            subprocess.run(["cwebp", "-q", "80", input_path, "-o", output_path])

            print(f"Converted: {input_path} -> {output_path}")

def main():
    # Specify the input and output folders
    input_folder = "."
    output_folder = "."

    # Check if cwebp command is available
    try:
        subprocess.run(["cwebp", "-version"], stdout=subprocess.PIPE, stderr=subprocess.PIPE)
    except FileNotFoundError:
        print("cwebp command not found. Downloading WebP tools...")
        download_webp_tools()

    # Check if the input folder exists
    if not os.path.exists(input_folder):
        print(f"Error: Input folder '{input_folder}' not found.")
        return

    # Check if the output folder exists, create it if not
    if not os.path.exists(output_folder):
        os.makedirs(output_folder)

    # Convert images to WebP format
    convert_to_webp(input_folder, output_folder)

if __name__ == "__main__":
    main()
