import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;
import 'dart:convert';
import 'category.dart'; // Mengimpor model Category
import 'post.dart'; // Mengimpor model Post

class Profile {
  final String judul;
  final String isi;

  Profile({required this.judul, required this.isi});

  factory Profile.fromJson(Map<String, dynamic> json) {
    return Profile(
      judul: json['judul'] ?? 'No Title',
      isi: json['isi'] ?? 'No Content',
    );
  }
}

class ProfileScreen extends StatefulWidget {
  @override
  _ProfileScreenState createState() => _ProfileScreenState();
}

class _ProfileScreenState extends State<ProfileScreen> {
  List<Profile> profiles = [];
  List<Category> categories = []; // Menyimpan data kategori
  List<Post> posts = []; // Menyimpan data post

  @override
  void initState() {
    super.initState();
    fetchProfile();
    fetchCategories(); // Memanggil fungsi untuk mengambil kategori
    fetchPosts(); // Memanggil fungsi untuk mengambil post
  }

  Future<void> fetchProfile() async {
    try {
      final response = await http.get(Uri.parse('http://10.0.2.2:8000/api/profile'));
      print('Response status: ${response.statusCode}');
      print('Response body: ${response.body}');

      if (response.statusCode == 200) {
        final List<dynamic> jsonResponse = json.decode(response.body);
        setState(() {
          profiles = jsonResponse.map((profile) => Profile.fromJson(profile)).toList();
        });
      } else {
        throw Exception('Failed to load profile');
      }
    } catch (e) {
      print('Error: $e');
    }
  }

  Future<void> fetchCategories() async {
    try {
      final response = await http.get(Uri.parse('http://10.0.2.2:8000/api/category'));
      print('Category Response status: ${response.statusCode}');
      print('Category Response body: ${response.body}');

      if (response.statusCode == 200) {
        final List<dynamic> jsonResponse = json.decode(response.body);
        setState(() {
          categories = jsonResponse.map((category) => Category.fromJson(category)).toList();
        });
      } else {
        throw Exception('Failed to load categories');
      }
    } catch (e) {
      print('Error: $e');
    }
  }

  Future<void> fetchPosts() async {
    try {
      final response = await http.get(Uri.parse('http://10.0.2.2:8000/api/post'));
      print('Post Response status: ${response.statusCode}');
      print('Post Response body: ${response.body}');

      if (response.statusCode == 200) {
        final List<dynamic> jsonResponse = json.decode(response.body);
        setState(() {
          posts = jsonResponse.map((post) => Post.fromJson(post)).toList();
        });
      } else {
        throw Exception('Failed to load posts');
      }
    } catch (e) {
      print('Error: $e');
    }
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text('Profile Sekolah'),
      ),
      body: Center(
        child: profiles.isEmpty
            ? CircularProgressIndicator()
            : Column(
                children: [
                  Expanded(
                    child: ListView.builder(
                      itemCount: profiles.length,
                      itemBuilder: (context, index) {
                        return Card(
                          margin: EdgeInsets.all(8.0),
                          child: ListTile(
                            title: Text(profiles[index].judul),
                            subtitle: Text(profiles[index].isi),
                          ),
                        );
                      },
                    ),
                  ),
                  // Menampilkan kategori di bawah profil
                  Padding(
                    padding: const EdgeInsets.all(8.0),
                    child: Text(
                      'Kategori:',
                      style: TextStyle(fontSize: 20, fontWeight: FontWeight.bold),
                    ),
                  ),
                  Expanded(
                    child: ListView.builder(
                      scrollDirection: Axis.horizontal,
                      itemCount: categories.length,
                      itemBuilder: (context, index) {
                        return Card(
                          margin: EdgeInsets.all(8.0),
                          child: Padding(
                            padding: const EdgeInsets.all(16.0),
                            child: Text(categories[index].title),
                          ),
                        );
                      },
                    ),
                  ),
                  // Menampilkan post di bawah kategori
                  Padding(
                    padding: const EdgeInsets.all(8.0),
                    child: Text(
                      'Posts:',
                      style: TextStyle(fontSize: 20, fontWeight: FontWeight.bold),
                    ),
                  ),
                  Expanded(
                    child: ListView.builder(
                      itemCount: posts.length,
                      itemBuilder: (context, index) {
                        return Card(
                          margin: EdgeInsets.all(8.0),
                          child: ListTile(
                            title: Text(posts[index].title), // Menggunakan 'title'
                            subtitle: Text(posts[index].content), // Menggunakan 'content'
                          ),
                        );
                      },
                    ),
                  ),
                ],
              ),
      ),
    );
  }
}
