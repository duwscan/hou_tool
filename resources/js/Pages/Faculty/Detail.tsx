import PanelLayout from "@/components/Layout/Layout";
import {Card, CardContent, CardHeader, CardTitle} from "@/components/ui/card";
import {BookOpen, GraduationCap, Info} from "lucide-react";

const Detail = () => {
    return <>
        <PanelLayout>
            <div className="container mx-auto py-8 px-4">
                <header className="text-center mb-12">
                    <h1 className="text-4xl font-bold mb-4">CLB Bay lắc</h1>
                    <Card className="mt-8">
                        <CardHeader>
                            <CardTitle className="flex items-center gap-2">
                                <Info className="h-6 w-6"/>
                                Thông tin thêm
                            </CardTitle>
                        </CardHeader>
                        <CardContent>
                            <p className="text-muted-foreground">
                                Để biết thêm thông tin chi tiết về chương trình học, các hoạt động ngoại khóa và cơ hội nghề
                                nghiệp, vui lòng liên hệ với văn phòng CLB Bay lắc hoặc truy cập trang web chính thức của
                                chúng tôi.
                            </p>
                        </CardContent>
                    </Card>
                </header>

                <div className="grid gap-8 md:grid-cols-2">
                    <Card>
                        <CardHeader>
                            <CardTitle className="flex items-center gap-2">
                                <GraduationCap className="h-6 w-6"/>
                                Chuẩn đầu ra
                            </CardTitle>
                        </CardHeader>
                        <CardContent>
                            <ul className="list-disc list-inside space-y-2">
                                <li>Áp dụng kiến thức cơ bản về công nghệ thông tin</li>
                                <li>Phát triển kỹ năng lập trình và giải quyết vấn đề</li>
                                <li>Thiết kế và triển khai các dự án phần mềm</li>
                                <li>Làm việc hiệu quả trong nhóm và giao tiếp chuyên nghiệp</li>
                                <li>Áp dụng các nguyên tắc đạo đức trong công nghệ thông tin</li>
                            </ul>
                        </CardContent>
                    </Card>

                    <Card>
                        <CardHeader>
                            <CardTitle className="flex items-center gap-2">
                                <BookOpen className="h-6 w-6"/>
                                Chương trình đào tạo
                            </CardTitle>
                        </CardHeader>
                        <CardContent>
                            <ul className="list-disc list-inside space-y-2">
                                <li>Nhập môn lập trình</li>
                                <li>Cơ sở dữ liệu</li>
                                <li>Mạng máy tính cơ bản</li>
                                <li>Lập trình hướng đối tượng</li>
                                <li>Phát triển ứng dụng web</li>
                                <li>An toàn thông tin</li>
                                <li>Trí tuệ nhân tạo và học máy</li>
                                <li>Quản lý dự án phần mềm</li>
                            </ul>
                        </CardContent>
                    </Card>
                </div>
            </div>
        </PanelLayout>

    </>
}
export default Detail;
